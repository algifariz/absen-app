<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index()
    {
        // data presensi in month now
        $month_now = Carbon::now()->format('m');
        // format tanggal presensi from '2023-03-15' to get month name
        $presensi = Presensi::whereMonth('tanggal', $month_now)->get();
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
