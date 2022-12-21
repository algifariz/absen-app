@extends('layouts.app')

@section('title', $title)

@push('style')
  <!-- CSS Libraries -->
@endpush

@section('main')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Tambah Data Tunjangan</h1>
      </div>

      @error('tingkatan_id')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="section-body">

        <div class="row">
          <div class="col-12 ">
            <div class="card">
              <form class="d-flex justify-content-center flex-column" action="/tunjangan/simpan_tunjangan" method="POST">
                @csrf
                <div class="col-12">
                  <div class="card-header">
                    <h4>Tambah Data Tunjangan</h4>
                  </div>
                  <div class="card-body col-8 mx-auto">
                    <div class="form-group">
                      <label>Jenis Tingkatan</label>
                      <select class="form-control" name="tingkatan_id">
                        <option value="" selected>Pilih Jenis Tingkatan</option>
                        @foreach ($tingkatan as $t)
                          <option value="{{ $t->id }}">{{ $t->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Besar Tunjangan </label>
                      <input type="text" class="form-control" required="" name="besar_tunjangan">
                    </div>
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
    </section>
  </div>
@endsection

@push('scripts')
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
@endpush
