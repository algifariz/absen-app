@extends('layouts.app')

@section('title', $title)

@push('style')
  <!-- CSS Libraries -->
@endpush

@section('main')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1></h1>
      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12 ">
            <div class="card">
              <form class="d-flex justify-content-center flex-column" action="{{ url('update-jabatan', $jabatan->id) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="col-12">
                  <div class="card-header">
                    <h4>Edit Jabatan</h4>
                  </div>
                  <div class="card-body col-8 mx-auto">
                    <div class="form-group">
                      <label>Nama Jabatan</label>
                      <input type="text" class="form-control" required="" name="nama_jabatan"
                        value="{{ $jabatan->nama_jabatan }}" disabled readonly>
                    </div>
                    <div class="form-group">
                      <label>Besar Tunjangan</label>
                      <input type="number" class="form-control" required="" name="besar_tunjangan"
                        value="{{ $jabatan->besar_tunjangan }}">
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
