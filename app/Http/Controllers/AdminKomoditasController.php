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
            'deskripsi' => 'required|string', // Tambahkan validasi deskripsi
            'bulan_panen' => 'array',
            'bulan_panen.*' => 'string',
            'harga' => 'array',
            'harga.*.bulan' => 'required|string',
            'harga.*.harga' => 'required|integer',
        ]);

        $komoditas = Komoditas::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi // Tambahkan deskripsi
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
}