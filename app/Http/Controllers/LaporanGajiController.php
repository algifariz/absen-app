<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LaporanGajiController extends Controller
{
    public function index()
    {
        // Guru with tunjangan then laporan_gajih with guru
        $laporan_gajih = Guru::with('jenis_tunjangan')->with('laporan')->with('jabatan')->with('jam_mengajar')->get();
        $data = [
            'title' => 'Laporan Gaji',
            'laporan_gajih' => $laporan_gajih,
            'type_menu' => 'laporan-gaji'
        ];

        return view('pages/laporan-gaji', $data);
    }

    public function tambah()
    {
        $guru = Guru::all();
        $bulan = [
            'januari' => 'januari',
            'februari' => 'februari',
            'maret' => 'maret',
            'april' => 'april',
            'mei' => 'mei',
            'juni' => 'juni',
            'juli' => 'juli',
            'agustus' => 'agustus',
            'september' => 'september',
            'oktober' => 'oktober',
            'november' => 'november',
            'desember' => 'desember'
        ];
        $monthNow = Str::lower(Carbon::now()->locale('id')->monthName);

        if (in_array($monthNow, $bulan)) {
            $bulan = Str::ucfirst($monthNow);
        }

        $tahun = Carbon::now()->year;

        $data = [
            'title' => 'Tambah Gaji',
            'guru' => $guru,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'type_menu' => 'laporan gaji'
        ];

        return view('pages/tambah-gaji', $data);
    }

    public function simpan_laporan(Request $request)
    {

        $request->validate([
            'nuptk' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
        ]);
        Laporan::create([
            'nuptk' => $request->nuptk,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun
        ]);

        return redirect('/laporan-gaji')->with('success', 'Data berhasil ditambahkan');
    }
}
