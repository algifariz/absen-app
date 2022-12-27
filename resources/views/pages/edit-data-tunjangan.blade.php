@extends('layouts.app')

@section('title', $title)

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
              <form action="{{ url('updateTunjangan', $tunjangan->id) }}" method="POST">
                @csrf
                @method('PUT') >
                <div class="col-12">
                  <div class="card-header">
                    <h4>Edit Data Tunjangan</h4>
                  </div>
                  <div class="card-body col-8 mx-auto">
                    <div class="form-group">
                      <label>Nama Tingkatan</label>
                      <select class="form-control" name="tingkatan_id">
                        <option value="" selected>Pilih Jenis Tingkatan</option>
                        @foreach ($tingkatan as $t)
                          <option value="{{ $t->id }}" {{ $t->id == $tunjangan->tingkatan_id ? 'selected' : '' }}>
                            {{ $t->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Besar Tunjangan </label>
                      <input type="text" class="form-control" required="" name="besar_tunjangan"
                        value="{{ $tunjangan->besar_tunjangan }}">
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
