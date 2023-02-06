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
            <div class="card">
              <div class="card-header">
                <h4>Data guru tidak hadir</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table-striped table" id="table-1">
                    <thead>
                      <tr>
                        <th scope="col"> No</th>
                        <th scope="col">NUPTK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">jam Masuk</th>
                        <th scope="col">jam Keluar</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($guru as $g)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $g->nuptk }}</td>
                          <td>{{ $g->nama }}</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>
                            <div class="badge badge-danger">Tidak Hadir</div>
                          </td>
                        </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data Presensi Guru</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table-striped table" id="table-1">
                    <thead>
                      <tr>
                        <th scope="col"> No</th>
                        <th scope="col">NUPTK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">jam Masuk</th>
                        <th scope="col">jam Keluar</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($presensi as $p)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $p->nuptk }}</td>
                          <td>{{ $p->guru[0]->nama }}</td>
                          <td>{{ $p->tanggal }}</td>
                          <td>{{ $p->jam_masuk }}</td>
                          <td>
                            @if ($p->jam_keluar == null)
                              -
                            @else
                              {{ $p->jam_keluar }}
                            @endif
                          </td>
                          <td>
                            @if ($p->status == 0)
                              <div class="badge badge-warning">Masuk</div>
                            @elseif($p->status == 1)
                              <div class="badge badge-success">Hadir</div>
                            @endif
                          </td>
                        </tr>
                      @endforeach

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
