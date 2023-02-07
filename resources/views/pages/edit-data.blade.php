@extends('layouts.app')

@section('title', $title)

@push('style')
  <!-- CSS Libraries -->
@endpush

@section('main')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Edit Data Guru</h1>
      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12 ">
            <div class="card">
              <div class="d-flex justify-content-center flex-column">
                <div class="col-12">
                  <div class="card-header">
                    <h4>Edit Data Guru</h4>
                  </div>
                  <form action="{{ url('updateGuru', $guru->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body col-8 mx-auto">
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required=""
                          value="{{ $guru->nama }}">
                      </div>
                      <div class="form-group">
                        <label>NUPTK</label>
                        <input type="text" name="nuptk" class="form-control" required=""
                          value="{{ $guru->nuptk }}">
                      </div>

                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" required=""
                          value="{{ $guru->tempat_lahir }}">
                      </div>

                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required=""
                          value="{{ $guru->tanggal_lahir }}">
                      </div>

                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                          <option value="" selected>Pilih Jenis Kelamin</option>
                          <option value="1" {{ $guru->jenis_kelamin == 1 ? 'selected' : '' }}>Laki-Laki</option>
                          <option value="0" {{ $guru->jenis_kelamin == 0 ? 'selected' : '' }}>Perempuan</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Agama</label>
                        <select class="form-control" name="agama">
                          <option value="" selected>Pilih Agama</option>
                          <option value="Islam" {{ $guru->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                          <option value="Kristen" {{ $guru->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                          <option value="Hindu" {{ $guru->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                          <option value="Budha" {{ $guru->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" required="">{{ $guru->alamat }}</textarea>
                      </div>

                      <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="no_hp" class="form-control" required=""
                          value={{ $guru->no_hp }}>
                      </div>

                      <div class="form-group">
                        <label>Jenis Tunjangan</label>
                        <select class="form-control" name="tunjangan_id">
                          <option value="" selected>Pilih Jenis Tunjangan</option>
                          @foreach ($tunjangan as $t)
                            <option value="{{ $t->id }}" {{ $t->id == $guru->tunjangan_id ? 'selected' : '' }}>
                              {{ $t->jenis_tunjangan }}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Nama Jabatan</label>
                        <select class="form-control" name="jabatan_id">
                          <option value="" selected>Pilih Jenis Tingkatan</option>
                          @foreach ($jabatan as $j)
                            <option value="{{ $j->id }}" {{ $j->id == $guru->jabatan_id ? 'selected' : '' }}>
                              {{ $j->nama_jabatan }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                  </form>

                </div>
              </div>
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
