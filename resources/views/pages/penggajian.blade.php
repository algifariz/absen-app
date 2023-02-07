@extends('layouts.app')

@section('title', 'Status Guru')

@push('style')
  <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')

  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>{{ $title }}</h1>
      </div>

      <div class="section-body">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data Penggajian Guru</h4>
              </div>
              <div class="card-body">
                <a href="tambah-data" class="btn btn-icon icon-left btn-primary mb-4"><i class="fa fa-user-plus"
                    aria-hidden="true"></i></i> Tambah Data Gaji</a>
                <div class="table-responsive">
                  <table class="table-striped table" id="table-1">
                    <thead>
                      <tr>
                        <th scope="col"> No</th>
                        <th scope="col">NUPTK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Bulan</th>
                        <th scope="col">Status</th>
                        <th scope="col">action</th>

                      </tr>
                    </thead>
                    <tbody>
                      <td>1</td>
                      <td>123456789</td>
                      <td>nama guru</td>
                      <td>Desember</td>
                      <td>
                        <div class="badge badge-success">Sudah Dibayar</div>
                        <div class="badge badge-danger">Belum Dibayar</div>
                      </td>
                      <td>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </tbody>
                  </table>
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
  {{-- <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script> --}}
  <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
  {{-- <script src="{{ asset() }}"></script> --}}
  {{-- <script src="{{ asset() }}"></script> --}}
  <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush
