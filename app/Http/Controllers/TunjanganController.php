<?php

namespace App\Http\Controllers;

use App\Models\Tingkatan;
use App\Models\Tunjangan;
use Illuminate\Http\Request;

class TunjanganController extends Controller
{
    public function index()
    {
        $title = 'Tunjangan Honor';
        $tunjangan = Tunjangan::all();
        $data = [
            'title' => $title,
            'tunjangan' => $tunjangan,
            'type_menu' => 'components'
        ];
        return view('pages/data-tunjangan', $data);
    }

    public function tambah()
    {
        $title = 'Tambah Tunjangan Honor';
        $tingkatan = Tingkatan::all();
        $data = [
            'title' => $title,
            'type_menu' => 'components',
            'tingkatan' => $tingkatan

        ];
        return view('pages/tambah-data-tunjangan', $data);
    }

    public function simpan_tunjangan(Request $request)
    {
        // custom message error
        $message = [
            'tingkatan_id.unique' => 'Tingkatan sudah ada, silahkan pilih tingkatan lain'
        ];

        $request->validate([
            'besar_tunjangan' => 'required',
            'tingkatan_id' => 'required|numeric|unique:tunjangan,tingkatan_id'
        ], $message);


        Tunjangan::create([
            'besar_tunjangan' => $request->besar_tunjangan,
            'tingkatan_id' => $request->tingkatan_id
        ]);

        return redirect('/data-tunjangan')->with('status', 'Data Tunjangan Berhasil Ditambahkan');
    }
}
