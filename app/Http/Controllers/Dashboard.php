<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class Dashboard extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $data = [
            'title' => $title,
            'type_menu' => 'dashboard'
        ];
        $jumlah_guru = Guru::all()->count();

        return view('pages/dashboard', $data)->with('jumlah_guru', $jumlah_guru);
    }
}
