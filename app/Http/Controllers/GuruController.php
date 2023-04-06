<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jabatan;
use App\Models\JenisTunjangan;
use Faker\Core\Number;
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

    $tunjangan = JenisTunjangan::find($request->tunjangan_id);
    $jabatan = Jabatan::find($request->jabatan_id);
    $tunjangan_pokok = intval($tunjangan->besar_tunjangan);
    $tunjangan_jabatan = intval($jabatan->besar_tunjangan);

    Guru::create([
      'nama' => $request->nama,
      'nuptk' => $request->nuptk,
      'tempat_lahir' => $request->tempat_lahir,
      'tanggal_lahir' => $request->tanggal_lahir,
      'jenis_kelamin' => $request->jenis_kelamin,
      'agama' => $request->agama,
      'alamat' => $request->alamat,
      'no_hp' => $request->no_hp,
      'tunjangan_id' => $request->tunjangan_id,
      'jabatan_id' => $request->jabatan_id,
      'tunjangan_pokok' => $tunjangan_pokok,
      'tunjangan_jabatan' => $tunjangan_jabatan
    ]);
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

    $tunjangan = JenisTunjangan::find($request->tunjangan_id);
    $jabatan = Jabatan::find($request->jabatan_id);
    $tunjangan_pokok = intval($tunjangan->besar_tunjangan);
    $tunjangan_jabatan = intval($jabatan->besar_tunjangan);

    $guru = Guru::find($id);
    $guru->nama = $request->nama;
    $guru->nuptk = $request->nuptk;
    $guru->tempat_lahir = $request->tempat_lahir;
    $guru->tanggal_lahir = $request->tanggal_lahir;
    $guru->jenis_kelamin = $request->jenis_kelamin;
    $guru->agama = $request->agama;
    $guru->alamat = $request->alamat;
    $guru->no_hp = $request->no_hp;
    $guru->tunjangan_pokok = $tunjangan_pokok;
    $guru->tunjangan_jabatan = $tunjangan_jabatan;
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
