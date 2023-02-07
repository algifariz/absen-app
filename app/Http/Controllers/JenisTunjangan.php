<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisTunjangan extends Controller
{
    public function index()
    {
        $tunjangan = \App\Models\JenisTunjangan::all();
        $data = [
            'title' => 'Data Jenis Tunjangan',
            'tunjangan' => $tunjangan,
            'type_menu' => 'data tunjangan'
        ];

        return view('pages/data-jenis-tunjangan', $data);
    }
}
