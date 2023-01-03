<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index()
    {
        // data presensi
        $presensi = Presensi::with('guru.tingkatan')->get();

        return view('pages/status-guru', [
            'type_menu' => 'status',
            'title' => 'Status Guru',
            'name' => 'Status Guru',
            'presensi' => $presensi,
        ]);
    }
}
