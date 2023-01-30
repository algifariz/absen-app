<?php

namespace App\Http\Controllers;

use App\Models\Tingkatan;

use Illuminate\Http\Request;

class TingkatanController extends Controller
{
  public function index()
  {
    $title = 'Data Tingkatan';
    $tingkatan = Tingkatan::all();
    $data = [
      'title' => $title,
      'tingkatan' => $tingkatan,
      'type_menu' => 'data tingkatan'
    ];
    return view('pages/data-tingkatan', $data);
  }
  public function tambah()
  {
    $title = 'Tambah Tingkatan';
    $data = [
      'title' => $title,
      'type_menu' => 'data tingkatan'
    ];
    return view('pages/tambah-tingkatan', $data);
  }

  public function simpan_tingkatan(Request $request)
  {
    $request->validate([
      'nama' => 'required',

    ]);

    Tingkatan::create($request->all());
    return redirect('/data-tingkatan')->with('status', 'Data Tingkatan Berhasil Ditambahkan');
  }

  public function edit($id)
  {
    $title = 'Edit Tingkatan ';
    $tingkatan = Tingkatan::find($id);
    $data = [
      'title' => $title,
      'tingkatan' => $tingkatan,
      'type_menu' => 'data tingkatan'
    ];
    return view('pages/edit-tingkatan', $data);
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'nama' => 'required',

    ]);
    $tingkatan = Tingkatan::find($id);
    $tingkatan->nama = $request->nama;
    $tingkatan->save();
    return redirect('/data-tingkatan')->with('status', 'Data Tingkatan Berhasil Diubah');
  }

  public function destroy($id)
  {
    $tingkatan = Tingkatan::find($id);
    $tingkatan->delete();
    return redirect('/data-tingkatan')->with('status', 'Data Tingkatan Berhasil Dihapus');
  }
}
