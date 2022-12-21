<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Tingkatan;
use Illuminate\Http\Request;

class GuruController extends Controller
{
  public function index()
  {
    $title = 'Data Guru';
    $guru = Guru::with('tingkatan')->get();
    $data = [
      'title' => $title,
      'guru' => $guru,
    ];
    return view('pages/data-guru', $data);
  }

  public function tambah()
  {
    $title = 'Tambah Data Guru';
    $tingkatan = Tingkatan::all();
    $data = [
      'title' => $title,
      'tingkatan' => $tingkatan,
      'type_menu' => 'components'

    ];
    return view('pages/tambah-data', $data);
  }

  public function simpan_guru(Request $request)
  {
    $request->validate([
      'nama' => 'required',
      'nuptk' => 'required',
      'tingkatan_id' => 'required',

    ]);

    Guru::create($request->all());
    return redirect('/data-guru')->with('status', 'Data Guru Berhasil Ditambahkan');
  }

  public function edit($id)
  {
    $title = 'Edit Data Guru';
    $guru = Guru::find($id);
    $tingkatan = Tingkatan::all();
    $data = [
      'title' => $title,
      'guru' => $guru,
      'tingkatan' => $tingkatan,
      'type_menu' => 'components'
    ];
    return view('pages/edit-data', $data);
  }

  public function update(Request $request, $id)
  {

    $request->validate([
      'nama' => 'required',
      'nuptk' => 'required',
      'tingkatan_id' => 'required',

    ]);
    $guru = Guru::find($id);
    $guru->nama = $request->nama;
    $guru->nuptk = $request->nuptk;
    $guru->tingkatan_id = $request->tingkatan_id;
    $guru->save();
    return redirect('/data-guru')->with('status', 'Data Guru Berhasil Diubah');
  }

  public function destroy($id)
  {
    $guru = Guru::find($id);
    $guru->delete();
    return redirect('/data-guru')->with('status', 'Data Guru Berhasil Dihapus');
  }
}
