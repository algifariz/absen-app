<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Presensi;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index()
    {
        // data presensi
        $presensi = Presensi::with('guru.tingkatan')->get();
        // data guru filter yang tidak ada di presensi
        $guru = Guru::whereNotIn('nuptk', function ($query) {
            $query->select('nuptk')->from('presensi')->where('tanggal', date('Y-m-d'));
        })->get();

        return view('pages/status-guru', [
            'type_menu' => 'status',
            'title' => 'Status Guru',
            'name' => 'Status Guru',
            'presensi' => $presensi,
            'guru' => $guru
        ]);
    }
}
