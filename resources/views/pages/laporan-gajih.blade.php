@extends('layouts.app')

@section('title', $title)

@push('style')
  <!-- CSS Libraries -->
@endpush

@section('main')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>{{ $name }}</h1>
      </div>
      <div class="card">
        <div class="card-header">
          <h5>Filter Laporan Gajih Guru</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <label for="bulan" class="col-sm-2 col-form-label col-form-label-lg">Bulan</label>
            <div class="col-sm-10">
              <select class="form-control" name="bulan" id="bulan">
                <option value="" selected>Pilih Bulan</option>
              </select>
            </div>
          </div>
          <div class="row">
            <label for="tahun" class="col-sm-2 col-form-label col-form-label-lg">Tahun</label>
            <div class="col-sm-10">
              <select class="form-control" name="tahun" id="tahun">
                <option value="" selected>Pilih Tahun</option>
              </select>
            </div>
          </div>

          </select>
          <a href="#" class="btn btn-primary" id="btn-cetak-laporan">Cetak Laporan Gajih</a>

        @endsection

        @push('scripts')
          <!-- JS Libraies -->

          <!-- Page Specific JS File -->
        @endpush
