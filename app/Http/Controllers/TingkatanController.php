<?php

namespace App\Http\Controllers;

use App\Models\Tingkatan;

use Illuminate\Http\Request;

class TingkatanController extends Controller
{
  public function index()
  {
    $title = 'Tingkat Honor';
    $tingkatan = Tingkatan::all();
    $data = [
      'title' => $title,
      'tingkatan' => $tingkatan,
    ];
    return view('pages/tingkat-honor', $data);
  }
  public function tambah()
  {
    $title = 'Tambah Tingkatan Honor';
    $data = [
      'title' => $title,
      'type_menu' => 'tingkat honor'
    ];
    return view('pages/tambah-tingkatan', $data);
  }

  public function simpan_tingkatan(Request $request)
  {
    $request->validate([
      'nama' => 'required',

    ]);

    Tingkatan::create($request->all());
    return redirect('/tingkat-honor')->with('status', 'Data Tingkatan Berhasil Ditambahkan');
  }

  public function edit($id)
  {
    $title = 'Edit Tingkatan Honor';
    $tingkatan = Tingkatan::find($id);
    $data = [
      'title' => $title,
      'tingkatan' => $tingkatan,
      'type_menu' => 'tingkat honor'
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
    return redirect('/tingkat-honor')->with('status', 'Data Tingkatan Berhasil Diubah');
  }

  public function destroy($id)
  {
    $tingkatan = Tingkatan::find($id);
    $tingkatan->delete();
    return redirect('/tingkat-honor')->with('status', 'Data Tingkatan Berhasil Dihapus');
  }
}
