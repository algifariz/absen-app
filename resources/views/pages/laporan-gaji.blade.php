@extends('layouts.app')

@section('title', 'Status Guru')

@push('style')
  <!-- CSS Libraries -->
  {{-- <link rel="stylesheet"
        href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css"> --}}

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
            <div class="card-header">
              <a href="tambah-gaji" class="btn btn-icon icon-left btn-primary mb-2"><i class="fa fa-user-plus"
                  aria-hidden="true"></i></i> Tambah Gaji Guru</a>
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table-striped table" id="table-2">
                      <thead>
                        <tr>
                          <th scope="col"> No</th>
                          <th scope="col">NUPTK</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Jenis Tunjangan</th>
                          <th scope="col">Jabatan</th>
                          <th scope="col">jumlah Tunjangan</th>
                          <th scope="col">Jumlah Jam</th>
                          <th scope="col">Potongan</th>
                          <th scope="col">Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        {{-- ({{ ddd($laporan_gajih[0]->guru->nama) }}) --}}
                        @foreach ($laporan_gajih as $gajih)
                          <tr>
                           
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $gajih->nuptk }}</td>
                            <td>{{ $gajih->nama }}</td>

                            <td>{{ $gajih->jenis_tunjangan->jenis_tunjangan }}</td>
                            <td>{{ $gajih->jabatan->nama_jabatan }}</td>
                            <td>Rp {{ number_format($gajih->jumlah_tunjangan, 0, ',', '.') }}</td>
                            <td>{{ $gajih->jam_mengajar[0]->jam_mengajar }} Jam</td>

                            {{-- <td>{{ $gajih[0]->jabatan->jabatan }}</td> --}}
                            {{--  --}}
                            {{-- <td>{{ $gajih->jumlah_jam }}</td>
                            <td>{{ $gajih->potongan }}</td>
                            <td>{{ $gajih->total }}</td> --}}
                          </tr>
                        @endforeach

                        </tr>
                      </tbody>
                    </table>
                  </div>
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
