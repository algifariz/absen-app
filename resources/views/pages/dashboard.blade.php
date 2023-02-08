@extends('layouts.app')

@section('title', $title)

@push('style')
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>{{ $title }}</h1>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Data Guru</h4>
              </div>
              <div class="card-body">
                {{ $jumlah_guru }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah jabatan</h4>
              </div>
              <div class="card-body">
                {{ $jumlah_jabatan - 1 }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah Tunjangan</h4>
              </div>
              <div class="card-body">
                {{ $jumlah_jenis_tunjangan }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fas fa-usd"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Online Users</h4>
              </div>
              <div class="card-body">
                47
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section-body">
        <div class="card">
          <div class="card-header">
            <h4>Visi & Misi</h4>
          </div>
          <div class="card">
            <div class="card-body">
              <h5>Visi</h5>
              <p>“Berprestasi dilandasi Iman, Taqwa dan Berbudaya Lingkungan serta Berwawasan Global”</p>
            </div>
          </div>

        </div>
        <div class="section-body">
          <div class="card">
            <div class="card-header">
              <h4>Visi & Misi</h4>
            </div>
            <div class="card">
              <div class="card-body">
                <h5>Misi</h5>
                <p>1. Mewujudkan peserta didik yang beriman, bertakwa, berbudaya lingkungan dan berwawasan global.</p>
                <p>2. Mewujudkan peserta didik yang berprestasi dalam bidang akademik, non akademik dan keagamaan.</p>
                <p>3. Mewujudkan peserta didik yang berakhlak mulia, berbudi pekerti luhur, berjiwa kewirausahaan dan
                  berwawasan lingkungan.</p>
                <p>4. Mewujudkan peserta didik yang berkepribadian islami, berakhlak mulia, berbudi pekerti luhur, berjiwa
                  kewirausahaan dan berwawasan lingkungan.</p>
                <p>5. Mewujudkan peserta didik yang berkepribadian islami, berakhlak mulia, berbudi pekerti luhur, berjiwa
                  kewirausahaan dan berwawasan lingkungan.</p>
                <p>6. Mewujudkan peserta didik yang berkepribadian islami, berakhlak mulia, berbudi pekerti luhur, berjiwa
                  kewirausahaan dan berwawasan lingkungan.</p>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>
@endsection

@push('scripts')
  <!-- JS Libraies -->
  <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
  <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
  <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
  <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
