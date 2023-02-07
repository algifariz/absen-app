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
              <form class="d-flex justify-content-center flex-column" action="{{ url('/simpan_jam_mengajar') }}"
                method="POST">
                @csrf
                @method('POST')
                <div class="col-12">
                  <div class="card-header">
                    <h4>Tambah Data Jam Mengajar</h4>
                  </div>
                  <div class="card-body col-8 mx-auto">
                    <div class="form-group mb-4">
                      <label>Nama</label>
                      <select class="form-control" name="nuptk">
                        <option value="" selected>Pilih Nama Guru</option>
                        @foreach ($guru as $g)
                          <option value="{{ $g->nuptk }}">{{ $g->nama }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Jam Mengajar</label>
                      <input type="number" name="jam_mengajar" class="form-control" required="">
                    </div>
                  </div>
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
