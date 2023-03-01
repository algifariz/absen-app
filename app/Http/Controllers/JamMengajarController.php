<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\JamMengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JamMengajarController extends Controller
{
    public function index()
    {
        $title = 'Data Jam Mengajar';
        $jam_mengajar = JamMengajar::with('guru')->get();

        $data = [
            'title' => $title,
            'jam_mengajar' => $jam_mengajar,
            'type_menu' => 'data jam mengajar'
        ];
        return view('pages/data-jam-mengajar', $data);
    }

    public function tambah()
    {
        $title = 'Tambah Jam Mengajar';
        $guru = Guru::all();

        $data = [
            'title' => $title,
            'guru' => $guru,
            'type_menu' => 'data jam mengajar'
        ];
        return view('pages/tambah-data-jam-mengajar', $data);
    }

    public function simpan_jam_mengajar(Request $request)
    {
        $request->validate([
            'nuptk' => 'required',
            'jam_mengajar' => 'required',
            'hari_mengajar' => 'required',
        ]);

        $jam_mengajar = JamMengajar::create([
            'nuptk' => $request->nuptk,
            'jam_mengajar' => $request->jam_mengajar,
            'hari_mengajar' => Str::lower($request->hari_mengajar),
        ]);

        if ($jam_mengajar) {
            return redirect('/data-jam-mengajar')->with('status', 'Data Jam Mengajar Berhasil Ditambahkan');
        } else {
            return redirect('/data-jam-mengajar')->with('status', 'Data Jam Mengajar Gagal Ditambahkan');
        }
    }

    public function edit($id)
    {
        $title = 'Edit Data Jam Mengajar';
        $jam_mengajar = JamMengajar::with('guru')->find($id);

        $data = [
            'title' => $title,
            'jam_mengajar' => $jam_mengajar,
            'type_menu' => 'data jam mengajar'
        ];
        return view('pages/edit-data-jam-mengajar', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nuptk' => 'required',
            'jam_mengajar' => 'required',
        ]);

        $jam_mengajar = JamMengajar::find($id);
        $jam_mengajar->nuptk = $request->nuptk;
        $jam_mengajar->jam_mengajar = $request->jam_mengajar;
        $jam_mengajar->hari_mengajar = Str::lower($request->hari_mengajar);
        $jam_mengajar->update();

        if ($jam_mengajar) {
            return redirect('/data-jam-mengajar')->with('status', 'Data Jam Mengajar Berhasil Diubah');
        } else {
            return redirect('/data-jam-mengajar')->with('status', 'Data Jam Mengajar Gagal Diubah');
        }
    }

    public function destroy($id)
    {
        $jam_mengajar = JamMengajar::find($id);
        $jam_mengajar->delete();

        return redirect('/data-jam-mengajar')->with('status', 'Data Jam Mengajar Berhasil Dihapus');
    }
}
