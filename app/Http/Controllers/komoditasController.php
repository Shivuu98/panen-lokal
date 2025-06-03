<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class KomoditasController extends Controller
{
    // Data dummy untuk simulasi
    private $data = [
        [
            'id' => 1,
            'nama' => 'Cabai Merah',
            'musim_panen' => ['Juni', 'Juli', 'Agustus'],
            'harga_bulanan' => [
                'Januari' => 30000,
                'Februari' => 28000,
                'Maret' => 25000,
                'April' => 22000,
                'Mei' => 18000,
                'Juni' => 10000,
                'Juli' => 9500,
                'Agustus' => 10500,
                'September' => 20000,
                'Oktober' => 25000,
                'November' => 27000,
                'Desember' => 29000,
            ],
        ],
        [
            'id' => 2,
            'nama' => 'Tomat',
            'musim_panen' => ['Mei', 'Juni', 'Juli'],
            'harga_bulanan' => [
                'Januari' => 18000,
                'Februari' => 16000,
                'Maret' => 15000,
                'April' => 14000,
                'Mei' => 9000,
                'Juni' => 8000,
                'Juli' => 8500,
                'Agustus' => 12000,
                'September' => 14000,
                'Oktober' => 16000,
                'November' => 18000,
                'Desember' => 19000,
            ],
        ],
        [
            'id' => 3,
            'nama' => 'Padi',
            'musim_panen' => ['Februari', 'Maret', 'September'],
            'harga_bulanan' => [
                'Januari' => 10000,
                'Februari' => 7000,
                'Maret' => 7500,
                'April' => 9500,
                'Mei' => 10000,
                'Juni' => 11000,
                'Juli' => 11500,
                'Agustus' => 12000,
                'September' => 8000,
                'Oktober' => 11000,
                'November' => 11500,
                'Desember' => 12000,
            ],
        ]
    ];

    

    // Helper untuk mendapatkan bulan sekarang
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
    return $bulan[$now]; // misal "May" => "Mei"
}


    public function home()
    {
        $bulanIni = $this->getCurrentMonth();

        $komoditas = collect($this->data)->map(function ($item) use ($bulanIni) {
            $item['is_panen_bulan_ini'] = in_array($bulanIni, $item['musim_panen']);
            $item['harga_bulan_ini'] = $item['harga_bulanan'][$bulanIni];
            return (object)$item;
        })->filter(fn($item) => $item->is_panen_bulan_ini);

        return view('home', ['komoditas' => $komoditas]);
    }

    public function index()
    {
        $bulanIni = $this->getCurrentMonth();

        $komoditas = collect($this->data)->map(function ($item) use ($bulanIni) {
            $item['is_panen_bulan_ini'] = in_array($bulanIni, $item['musim_panen']);
            $item['harga_bulan_ini'] = $item['harga_bulanan'][$bulanIni];
            return (object)$item;
        });

        return view('komoditas.index', ['komoditas' => $komoditas]);
    }

    public function show($id)
    {
        $komoditas = collect($this->data)->firstWhere('id', $id);

        if (!$komoditas) {
            abort(404);
        }

        $komoditas['harga_bulan_ini'] = $komoditas['harga_bulanan'][$this->getCurrentMonth()];

        return view('komoditas.show', [
            'komoditas' => (object)$komoditas,
            'harga_bulanan' => $komoditas['harga_bulanan'],
        ]);

    }

    
}
