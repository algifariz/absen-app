<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // dd($request->all());
        $qr = $request->qr_code;
        $data = "Hello";

        if ($qr == $data) {
            return response()->json([
                'status' => 200,
            ]);
        } else {
            return response()->json([
                'status' => 400,
            ]);
        }
    }
}
