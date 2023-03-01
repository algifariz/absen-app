@extends('layouts.app')

@section('title', $title)

@push('style')
  <!-- CSS Libraries -->
@endpush

@section('main')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Tambah Data Jam Mengajar</h1>
      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12 ">
            <div class="card">
              <form class="d-flex justify-content-center flex-column"
                action="{{ url('/update-jam-mengajar', $jam_mengajar->id) }}" method='POST'>
                @csrf
                @method('PUT')
                <div class="col-12">
                  <div class="card-header">
                    <h4>Tambah Data Jam Mengajar</h4>
                  </div>
                  <div class="card-body col-8 mx-auto">
                    <div class="form-group mb-4">
                      <label>Nama</label>
                      {{-- disabled input value $guru->nuptk and show $guru->nama --}}
                      <input type="text" name="nama_guru" class="form-control" value="{{ $jam_mengajar->guru->nama }}"
                        disabled>
                      <input type="hidden" name="nuptk" value="{{ $jam_mengajar->guru->nuptk }}">

                    </div>

                    <div class="form-group">
                      <label>Jam Mengajar</label>
                      <input type="number" name="jam_mengajar" class="form-control"
                        value="{{ $jam_mengajar->jam_mengajar }}" required>
                    </div>

                    <div class="form-group">
                      <label>Hari Mengajar</label>
                      <input type="text" name="hari_mengajar" class="form-control"
                        value="{{ $jam_mengajar->hari_mengajar }}" required>
                    </div>
                  </div>
                </div>

            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary"type='submit'>Submit</button>
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
