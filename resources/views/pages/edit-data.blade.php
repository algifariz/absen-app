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
                        <input type="text" class="form-control" required="" name="nama"
                          value="{{ $guru->nama }}">
                      </div>
                      <div class="form-group">
                        <label>NUPTK</label>
                        <input type="text" class="form-control" required="" name="nuptk"
                          value="{{ $guru->nuptk }}">
                      </div>
                      <div class="form-group">
                        <label>Jenis Tunjangan</label>
                        <select class="form-control" name="tingkatan_id">
                          <option value="">Pilih Data Tingkatan</option>
                          @foreach ($tingkatan as $ting)
                            <option value="{{ $ting->id }}" {{ $ting->id == $guru->tingkatan_id ? 'selected' : '' }}>
                              {{ $ting->nama }}</option>
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
