<?php

namespace App\Http\Controllers;

use App\Models\Komoditas;
use Illuminate\Http\Request;

class AdminKomoditasController extends Controller
{
    public function index()
    {
        $komoditas = Komoditas::with(['musimPanen', 'harga'])->get();
        return view('admin.komoditas.index', compact('komoditas'));
    }

    public function create()
    {
        return view('admin.komoditas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'daerah' => 'required|string',
            'deskripsi' => 'required|string',
            'bulan_panen' => 'array',
            'bulan_panen.*' => 'string',
            'harga' => 'array',
            'harga.*.bulan' => 'required|string',
            'harga.*.harga' => 'required|integer',
        ]);

        $komoditas = Komoditas::create([
            'nama' => $request->nama,
            'daerah' => $request->daerah,
            'deskripsi' => $request->deskripsi
]);

        // Simpan bulan panen
        foreach ($request->bulan_panen as $bulan) {
            $komoditas->musimPanen()->create(['bulan' => $bulan]);
        }

        // Simpan harga per bulan
        foreach ($request->harga as $item) {
            $komoditas->harga()->create([
                'bulan' => $item['bulan'],
                'harga' => $item['harga']
            ]);
        }

        return redirect()->route('admin.komoditas.index')->with('success', 'Komoditas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $komoditas = Komoditas::findOrFail($id);
        return view('admin.komoditas.edit', compact('komoditas'));
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string',
        'daerah' => 'required|string',
        'deskripsi' => 'required|string',
        // tambahkan validasi untuk bulan_panen dan harga jika diperlukan
    ]);

    $komoditas = Komoditas::findOrFail($id);
    $komoditas->update([
        'nama' => $request->nama,
        'daerah' => $request->daerah,
        'deskripsi' => $request->deskripsi,
    ]);



    return redirect()->route('admin.komoditas.index')->with('success', 'Komoditas berhasil diupdate!');
}
public function destroy($id)
{
    $komoditas = Komoditas::findOrFail($id);
    $komoditas->delete();
    return redirect()->route('admin.komoditas.index')->with('success', 'Komoditas berhasil dihapus!');
}
}
