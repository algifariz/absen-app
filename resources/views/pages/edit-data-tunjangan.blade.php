@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
  <!-- CSS Libraries -->
@endpush

@section('main')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Edit Data Tunjangan</h1>
      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12 ">
            <div class="card">
              <form class="d-flex justify-content-center flex-column">
                <div class="col-12">
                  <div class="card-header">
                    <h4>Edit Data Tunjangan</h4>
                  </div>
                  <div class="card-body col-8 mx-auto">
                    <div class="form-group">
                      <label>Nama Tingkatan</label>
                      <input type="text" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label>Besar Tunjangan </label>
                      <input type="text" class="form-control" required="">
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
