<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komoditas;
use Carbon\Carbon;

class KomoditasController extends Controller
{
    private function getCurrentMonth()
    {
        $bulan = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember',
        ];

        $now = Carbon::now()->format('F');
        return $bulan[$now];
    }

    public function index()
    {
        $bulanIni = $this->getCurrentMonth();

        $komoditas = Komoditas::with(['musimPanen', 'harga'])->get()->map(function ($item) use ($bulanIni) {
            $item->is_panen_bulan_ini = $item->musimPanen->pluck('bulan')->contains($bulanIni);
            $item->harga_bulan_ini = optional($item->harga->firstWhere('bulan', $bulanIni))->harga;
            return $item;
        });

        return view('komoditas.index', compact('komoditas'));
    }

    public function show($id)
    {
        $komoditas = Komoditas::with(['musimPanen', 'harga'])->findOrFail($id);
        $bulanIni = $this->getCurrentMonth();

        $komoditas->harga_bulan_ini = optional($komoditas->harga->firstWhere('bulan', $bulanIni))->harga;
        $harga_bulanan = $komoditas->harga->pluck('harga', 'bulan');

        return view('komoditas.show', [
            'komoditas' => $komoditas,
            'harga_bulanan' => $harga_bulanan
        ]);
    }

    public function home()
    {
        $bulanIni = $this->getCurrentMonth();

        $komoditas = Komoditas::with(['musimPanen', 'harga'])
            ->get()
            ->filter(function ($item) use ($bulanIni) {
                return $item->musimPanen->pluck('bulan')->contains($bulanIni);
            })->map(function ($item) use ($bulanIni) {
                $item->harga_bulan_ini = optional($item->harga->firstWhere('bulan', $bulanIni))->harga;
                return $item;
            });

        return view('home', compact('komoditas'));
    }
}
