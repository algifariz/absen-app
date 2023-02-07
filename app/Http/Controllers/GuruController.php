<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jabatan;
use App\Models\Tingkatan;
use App\Models\Tunjangan;
use App\Models\JenisTunjangan;
use Illuminate\Http\Request;

class GuruController extends Controller
{
  public function index()
  {
    $title = 'Data Guru';
    $guru = Guru::with('jenis_tunjangan')->with('jabatan')->get();

    $data = [
      'title' => $title,
      'guru' => $guru,
      'type_menu' => 'data guru'
    ];
    return view('pages/data-guru', $data);
  }

  public function tambah()
  {
    $title = 'Tambah Data Guru';
    $tunjangan = JenisTunjangan::all();
    $jabatan = Jabatan::all();
    $data = [
      'title' => $title,
      'tunjangan' => $tunjangan,
      'jabatan' => $jabatan,
      'type_menu' => 'data guru'

    ];
    return view('pages/tambah-data', $data);
  }

  public function simpan_guru(Request $request)
  {
    $request->validate([
      'nama' => 'required',
      'nuptk' => 'required',
      'tempat_lahir' => 'required',
      'tanggal_lahir' => 'required',
      'jenis_kelamin' => 'required',
      'agama' => 'required',
      'alamat' => 'required',
      'no_hp' => 'required',
      'tunjangan_id' => 'required',
      'jabatan_id' => 'required',
    ]);

    Guru::create($request->all());
    return redirect('/data-guru')->with('status', 'Data Guru Berhasil Ditambahkan');
  }

  public function detail($id)
  {
    $title = 'Detail Data Guru';
    $guru = Guru::find($id);

    $data = [
      'title' => $title,
      'guru' => $guru,
      'type_menu' => 'data guru'
    ];
    return view('pages/detail-guru', $data);
  }

  public function edit($id)
  {
    $title = 'Edit Data Guru';
    $guru = Guru::find($id);
    $tunjangan = JenisTunjangan::all();
    $jabatan = Jabatan::all();

    $data = [
      'title' => $title,
      'guru' => $guru,
      'tunjangan' => $tunjangan,
      'jabatan' => $jabatan,
      'type_menu' => 'data guru'
    ];
    return view('pages/edit-data', $data);
  }

  public function update(Request $request, $id)
  {

    $request->validate([
      'nama' => 'required',
      'nuptk' => 'required',
      'tempat_lahir' => 'required',
      'tanggal_lahir' => 'required',
      'jenis_kelamin' => 'required',
      'agama' => 'required',
      'alamat' => 'required',
      'no_hp' => 'required',
      'tunjangan_id' => 'required',
      'jabatan_id' => 'required',
    ]);

    $guru = Guru::find($id);
    $guru->nama = $request->nama;
    $guru->nuptk = $request->nuptk;
    $guru->tempat_lahir = $request->tempat_lahir;
    $guru->tanggal_lahir = $request->tanggal_lahir;
    $guru->jenis_kelamin = $request->jenis_kelamin;
    $guru->agama = $request->agama;
    $guru->alamat = $request->alamat;
    $guru->no_hp = $request->no_hp;
    $guru->tunjangan_id = $request->tunjangan_id;
    $guru->jabatan_id = $request->jabatan_id;

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
