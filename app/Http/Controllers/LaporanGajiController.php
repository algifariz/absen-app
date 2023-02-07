<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanGajiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Laporan Gaji',
            'type_menu' => 'laporan gaji'
        ];

        return view('pages/laporan-gaji', $data);
    }
}
