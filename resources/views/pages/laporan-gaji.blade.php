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

      <a href="tambah-gaji" class="btn btn-icon icon-left btn-primary mb-2"><i class="fa fa-user-plus"
          aria-hidden="true"></i></i> Tambah Gaji Guru</a>
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card-header">
              {{-- show message from error --}}
              @if (session('status'))
                <div class="alert alert-success">
                  {{ session('status') }}
                </div>
              @endif
              @if (session('error'))
                <div class="alert alert-danger">
                  {{ session('error') }}
                </div>
              @endif
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
                          <th scope="col">Tunjangan Pokok</th>
                          <th scope="col">Tunjangan Jabatan</th>
                          <th scope="col">Jam Mengajar</th>
                          <th scope="col">Ketidakhadiran</th>
                          <th scope="col">Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($laporan_gajih as $key => $gajih)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $gajih->nuptk }}</td>
                            <td>{{ $gajih->guru->nama }}</td>

                            <td>{{ $gajih->guru->jenis_tunjangan->jenis_tunjangan }}</td>
                            <td>{{ $gajih->guru->jabatan->nama_jabatan }}</td>
                            <td>Rp {{ number_format($gajih->guru->tunjangan_pokok, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($gajih->guru->tunjangan_jabatan, 0, ',', '.') }}</td>
                            <td>{{ $gajih->guru->jam_mengajar[0]->jam_mengajar }} Jam</td>

                            {{-- {{ $count[$loop->iteration - 1]->guru->presensi->count() }} --}}
                            @php
                              $hari = $gajih->guru->jam_mengajar[0]->hari_mengajar;
                              $hari = explode(',', $hari);
                              $hari = count($hari);
                              $total_hari_satu_bulan = $hari * 4;
                              
                              $total_presensi_satu_bulan = intval($gajih->guru->jam_mengajar[0]->jam_mengajar) * 4;
                              $presensi = $count[$key]->guru->presensi;
                              $presensi_filter = $presensi->map(function ($item, $key) {
                                  if ($item->jam_keluar != null) {
                                      return $item->created_at->format('m');
                                  }
                              });
                              $filtered = $presensi_filter->filter(function ($item) use ($month_now) {
                                  return $item == $month_now;
                              });
                              
                              $hari_tidak_hadir = $total_hari_satu_bulan - $filtered->count();
                              
                              $jenis_denda = $gajih->guru->jenis_tunjangan->id;
                              // TODO Ganti denda
                              $denda = [
                                  '1' => 50000,
                                  '2' => 100000,
                                  '3' => 150000,
                              ];
                              
                              $total_gaji = $total_presensi_satu_bulan * $gajih->guru->tunjangan_pokok - $denda[$jenis_denda] * $hari_tidak_hadir + $gajih->guru->tunjangan_jabatan;
                            @endphp

                            <td>{{ $hari_tidak_hadir }} Hari</td>
                            {{-- TODO: gajih hasil dari total presensi 1 bulan - denda * harga --}}
                            <td>
                              Rp
                              {{ number_format($total_gaji, 0, ',', '.') }}
                            </td>



                            {{-- <td>{{ $gajih->jam_mengajar[0]->jam_mengajar }} Jam</td> --}}

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
