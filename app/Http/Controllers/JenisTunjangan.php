<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisTunjangan extends Controller
{
    public function index()
    {
        $tunjangan = \App\Models\JenisTunjangan::all();
        $data = [
            'title' => 'Data Jenis Tunjangan',
            'tunjangan' => $tunjangan,
            'type_menu' => 'data tunjangan'
        ];

        return view('pages/data-jenis-tunjangan', $data);
    }

    public function edit($id)
    {
        $tunjangan = \App\Models\JenisTunjangan::find($id);
        $data = [
            'title' => 'Edit Jenis Tunjangan',
            'tunjangan' => $tunjangan,
            'type_menu' => 'data jenis tunjangan'
        ];

        return view('pages/edit-jenis-tunjangan', $data);
    }

    public function update(Request $request, $id)
    {
        $tunjangan = \App\Models\JenisTunjangan::find($id);
        $tunjangan->besar_tunjangan = $request->besar_tunjangan;
        $tunjangan->save();

        return redirect('data-tunjangan');
    }
}
