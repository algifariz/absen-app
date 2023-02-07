<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan = \App\Models\Jabatan::all();
        $data = [
            'title' => 'Data Jabatan',
            'jabatan' => $jabatan,
            'type_menu' => 'data jabatan'
        ];

        return view('pages/data-jabatan', $data);
    }
}
