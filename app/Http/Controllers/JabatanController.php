<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan = \App\Models\Jabatan::where('id', '!=', 1)->get();
        $data = [
            'title' => 'Data Jabatan',
            'jabatan' => $jabatan,
            'type_menu' => 'data jabatan'
        ];

        return view('pages/data-jabatan', $data);
    }

    public function edit($id)
    {
        $jabatan = \App\Models\Jabatan::find($id);
        $data = [
            'title' => 'Edit Jabatan',
            'jabatan' => $jabatan,
            'type_menu' => 'data jabatan'
        ];

        return view('pages/edit-jabatan', $data);
    }

    public function update(Request $request, $id)
    {
        $jabatan = \App\Models\Jabatan::find($id);
        $jabatan->besar_tunjangan = $request->besar_tunjangan;
        $jabatan->save();

        return redirect('/data-jabatan');
    }
}
