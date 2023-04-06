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
        // month_now_id is name of month now in locale id
        $month_now_id = Carbon::now()->locale('id')->monthName;
        $laporan_gajih = Laporan::with('guru.jabatan', 'guru.jenis_tunjangan', 'guru.jam_mengajar')->where('bulan', $month_now_id)->get();

        // get month now
        $month_now = Carbon::now()->format('m');
        // count presensi each guru in laporan gaji in month now
        $count = Laporan::with('guru.presensi')->whereMonth('created_at', $month_now)->get();
        $data = [
            'title' => 'Laporan Gaji',
            'laporan_gajih' => $laporan_gajih,
            'count' => $count,
            'month_now' => $month_now,
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

        $month_now = Carbon::now()->format('m');
        // if guru already in laporan gaji in month now, then redirect to laporan gaji and not add new laporan gaji
        if (Laporan::where('nuptk', $request->nuptk)->whereMonth('created_at', $month_now)->exists()) {
            return redirect('/laporan-gaji')->with('error', 'Guru sudah ada di laporan gaji bulan ini');
        }


        Laporan::create([
            'nuptk' => $request->nuptk,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun
        ]);

        return redirect('/laporan-gaji')->with('success', 'Data berhasil ditambahkan');
    }
}
