<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Presensi;
use App\Models\Jabatan;
use App\Models\JenisTunjangan;

class Dashboard extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        $jumlah_guru = Guru::all()->count();
        $jumlah_jabatan = Jabatan::all()->count();
        $jumlah_jenis_tunjangan = JenisTunjangan::all()->count();
        $data = [
            'title' => $title,
            'jumlah_guru' => $jumlah_guru,
            'jumlah_jabatan' => $jumlah_jabatan,
            'jumlah_jenis_tunjangan' => $jumlah_jenis_tunjangan,
            'type_menu' => 'dashboard'
        ];

        return view('pages/dashboard', $data);
    }
}
