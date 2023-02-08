<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use BaconQrCode\Encoder\QrCode as EncoderQrCode;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
{
    public function index()
    {
        return view('pages/generate-qr-code', [
            'type_menu' => 'generate qr code',
            'title' => 'Generate QR Code',
            'guru' => Guru::all(),
            'name' => 'Generate QR Code',
        ]);
    }

    public function generate_qr_code_guru(Request $request)
    {
        $request->validate([
            'guru_id' => 'required',
        ]);

        $nuptk = Guru::find($request->guru_id)->nuptk;

        $qrCodeData = QrCode::size(350)->generate($nuptk);

        return view('pages/generate-qr-code', [
            'type_menu' => 'generate qr code',
            'title' => 'Generate QR Code',
            'guru' => Guru::all(),
            'name' => 'Generate QR Code',
            'qrCodeData' => $qrCodeData,
            'nuptk' => $nuptk,
            'namaGuru' => Guru::find($request->guru_id)->nama,
        ]);
    }
}
