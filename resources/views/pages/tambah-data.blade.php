@extends('layouts.app')

@section('title', $title)

@push('style')
  <!-- CSS Libraries -->
@endpush

@section('main')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Tambah Data Guru</h1>
      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12 ">
            <div class="card">
              <form class="d-flex justify-content-center flex-column" action="{{ url('/guru/simpan_guru') }}" method="POST">
                @csrf
                @method('POST')
                <div class="col-12">
                  <div class="card-header">
                    <h4>Tambah Data Guru</h4>
                  </div>
                  <div class="card-body col-8 mx-auto">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label>NUPTK</label>
                      <input type="text" name="nuptk" class="form-control" required="">
                    </div>

                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" name="tempat_lahir" class="form-control" required="">
                    </div>

                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="date" name="tanggal_lahir" class="form-control" required="">
                    </div>

                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" name="jenis_kelamin">
                        <option value="" selected>Pilih Jenis Kelamin</option>
                        <option value="1">Laki-Laki</option>
                        <option value="0">Perempuan</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Agama</label>
                      <select class="form-control" name="agama">
                        <option value="" selected>Pilih Agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea name="alamat" class="form-control" required=""></textarea>
                    </div>

                    <div class="form-group">
                      <label>No HP</label>
                      <input type="text" name="no_hp" class="form-control" required="">
                    </div>

                    <div class="form-group">
                      <label>Jenis Tunjangan</label>
                      <select class="form-control" name="tunjangan_id">
                        <option value="" selected>Pilih Jenis Tingkatan</option>
                        @foreach ($tunjangan as $t)
                          <option value="{{ $t->id }}">{{ $t->jenis_tunjangan }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Nama Jabatan</label>
                      <select class="form-control" name="jabatan_id">
                        <option value="" selected>Pilih Jenis Tingkatan</option>
                        @foreach ($jabatan as $j)
                          <option value="{{ $j->id }}">{{ $j->nama_jabatan }}</option>
                        @endforeach
                      </select>
                    </div>

                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                  </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section>
  </div>
@endsection

@push('scripts')
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
@endpush
