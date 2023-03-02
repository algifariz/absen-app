<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\JamMengajar;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ScanController extends Controller
{
    public function index()
    {
        return view('pages/scan', [
            'type_menu' => 'scan qr',
            'title' => 'Scan QR Code',
            'name' => 'Scan QR Code',
        ]);
    }

    public function validasi(Request $request)
    {
        $nuptk = $request->qr_code;

        // check if nuptk exists in table guru
        $guru = Guru::where('nuptk', $nuptk)->first();

        if ($guru) {
            // Then check if nuptk not exists in table presensi for today
            $presensi = Presensi::where('nuptk', $nuptk)->where('tanggal', date('Y-m-d'))->first();

            if ($presensi) {
                // Check if nuptk exists in table presensi for today and jam_keluar is null
                $presensi = Presensi::where('nuptk', $nuptk)->where('tanggal', date('Y-m-d'))->where('jam_keluar', null)->first();

                if ($presensi) {
                    // Make cooldown absen should be 10 minutes after jam_masuk
                    $jam_masuk = date('H:i:s', strtotime($presensi->jam_masuk));
                    $jam_sekarang = date('H:i:s', strtotime('+7 hours'));

                    $jam_masuk = strtotime($jam_masuk);
                    $jam_sekarang = strtotime($jam_sekarang);

                    $selisih = $jam_sekarang - $jam_masuk;

                    if ($selisih > 600) {
                        $update = Presensi::where('nuptk', $nuptk)->where('tanggal', date('Y-m-d'))->where('jam_keluar', null)->update(
                            [
                                'jam_keluar' => date('H:i:s', strtotime('+7 hours')),
                                'status' => 1,
                            ]
                        );

                        if ($update) {
                            return response()->json([
                                'status' => 200,
                                'message' => 'Berhasil',
                            ]);
                        } else {
                            return response()->json([
                                'status' => 400,
                                'message' => 'Gagalbhvgcffgfgfg',
                            ]);
                        }
                    } else {
                        return response()->json([
                            'status' => 400,
                            'message' => 'Gagal, terlalu cepat absen!',
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => 400,
                        'message' => 'Gagal, Kamu sudah absen hari ini!',
                    ]);
                }
            } else {
                // Check if day_now is in hari_mengajar
                $jam_mengajar = JamMengajar::with('guru')->where('nuptk', $nuptk)->get();
                $hari_mengajar = explode(',', $jam_mengajar[0]->hari_mengajar);
                $day_now = Str::lower(Carbon::now()->locale('id')->dayName);

                if (in_array($day_now, $hari_mengajar)) {
                    $create = Presensi::create(
                        [
                            'nuptk' => $nuptk,
                            'tanggal' => date('Y-m-d'),
                            'jam_masuk' => date('H:i:s', strtotime('+7 hours')),
                            'jam_keluar' => null,
                            'kehadiran' => 1,
                            'status' => 0,
                        ]
                    );
                    // If success then return status 200 else return status 400
                    if ($create) {
                        return response()->json([
                            'status' => 200,
                            'message' => 'Berhasil',
                        ]);
                    } else {
                        return response()->json([
                            'status' => 400,
                            'message' => 'Gagal',
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => 400,
                        'message' => 'Gagal, hari ini tidak ada jam mengajar!',
                    ]);
                }
            }
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal',
            ]);
        }
    }
}
