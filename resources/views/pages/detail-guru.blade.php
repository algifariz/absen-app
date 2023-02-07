@extends('layouts.app')

@section('title', $title)

@push('style')
  <!-- CSS Libraries -->
@endpush

@section('main')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Detail Data Guru</h1>
      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12 ">
            <div class="card">
              <div class="d-flex justify-content-center flex-column">
                <div class="col-12">
                  <div class="card-header">
                    <h4>Detail Data Guru</h4>
                  </div>
                  <div class="card-body col-8 mx-auto">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control" required="" value="{{ $guru->nama }}"
                        disabled readonly>
                    </div>
                    <div class="form-group">
                      <label>NUPTK</label>
                      <input type="text" name="nuptk" class="form-control" required="" value="{{ $guru->nuptk }}"
                        disabled readonly>
                    </div>

                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" name="tempat_lahir" class="form-control" required=""
                        value="{{ $guru->tempat_lahir }}" disabled readonly>
                    </div>

                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="date" name="tanggal_lahir" class="form-control" required=""
                        value="{{ $guru->tanggal_lahir }}" disabled readonly>
                    </div>

                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <input type="text" name="jenis_kelamin" class="form-control" required=""
                        value="{{ $guru->jenis_kelamin == 1 ? 'Laki-Laki' : 'Perempuan' }}" disabled readonly>
                    </div>

                    <div class="form-group">
                      <label>Agama</label>
                      <input type="text" name="agama" class="form-control" required="" value="{{ $guru->agama }}"
                        disabled readonly>
                    </div>

                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" class="form-control" required="" value="{{ $guru->alamat }}"
                        disabled readonly>
                    </div>

                    <div class="form-group">
                      <label>No HP</label>
                      <input type="text" name="no_hp" class="form-control" required="" value={{ $guru->no_hp }}
                        disabled readonly>
                    </div>

                    <div class="form-group">
                      <label>Jenis Tunjangan</label>
                      <input type="text" name="jenis_tunjangan" class="form-control" required=""
                        value="{{ $guru->jenis_tunjangan->jenis_tunjangan }}" disabled readonly>
                    </div>

                    <div class="form-group">
                      <label>Nama Jabatan</label>
                      <input type="text" name="nama_jabatan" class="form-control" required=""
                        value="{{ $guru->jabatan->nama_jabatan }}" disabled readonly>
                    </div>

                    <div class="card-footer text-right p-0">
                      <a href="{{ route('data-guru') }}" class="btn btn-warning">Kembali</a>
                    </div>
                  </div>


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
