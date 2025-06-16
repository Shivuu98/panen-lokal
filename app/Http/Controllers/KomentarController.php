<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function store(Request $request, $artikel_id)
    {
        $request->validate(['isi' => 'required']);
        \App\Models\Komentar::create([
            'artikel_id' => $artikel_id,
            'user_id' => auth()->id(),
            'isi' => $request->isi,
        ]);
        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}
