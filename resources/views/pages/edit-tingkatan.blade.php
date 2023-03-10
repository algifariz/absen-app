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
              <form class="d-flex justify-content-center flex-column" action="{{ url('updateTingkatan', $tingkatan->id) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="col-12">
                  <div class="card-header">
                    <h4>Edit Tingkatan</h4>
                  </div>
                  <div class="card-body col-8 mx-auto">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" required="" name="nama"
                        value="{{ $tingkatan->nama }}">
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
