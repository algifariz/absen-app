@extends('layouts.app')

@section('title', $title)

@push('style')
  <!-- CSS Libraries -->
@endpush

@section('main')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>{{ $title }}</h1>
      </div>
      {{-- show status --}}
      @if (session()->has('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      <div class="card-header">
        <a href="tambah-data-jam-mengajar" class="btn btn-icon icon-left btn-primary mb-2"><i class="fa fa-plus"
            aria-hidden="true"></i></i> Tambah Data Jam Mengajar</a>
        <div class="card">
          <div class="card-header">
            <h4>{{ $title }}</h4>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">NO</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Besar Tunjangan</th>
                  <th scope="col">Jam Mengajar</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($jam_mengajar as $jam)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                      {{ $jam->guru->nama }}
                    </td>
                    <td>
                      @foreach ($tunjangan as $tun)
                        @if ($tun->tingkatan_id == $jam->guru->tingkatan_id)
                          Rp {{ number_format($tun->besar_tunjangan, 0, ',', '.') }}
                        @endif
                      @endforeach
                    </td>
                    <td>{{ $jam->jam_mengajar }} Jam</td>
                    <td>
                      <a href="/edit-data-jam-mengajar/{{ $jam->id }}" class="btn btn-icon icon-left btn-primary"><i
                          class="far fa-edit"></i>Edit</a>
                      <form action="/" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')"
                          class="btn btn-icon icon-left btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></i>
                          Hapus</button>
                      </form>
                    </td>
                  </tr>
                @endforeach

                {{-- @foreach ($guru as $g)
                  <tr>
                    <th scope="row">{{ $g->id }}</th>
                    <td>{{ $g->nama }} </td>
                    <td>{{ $g->nuptk }}</td>
                    <td>{{ $g->tingkatan->nama }}</td>

                    <td>150.000</td>
                    <td>
                      <a href="/edit-data/{{ $g->id }}" class="btn btn-icon icon-left btn-primary"><i
                          class="far fa-edit"></i>Edit</a>
                      <form action="/hapusGuru/{{ $g->id }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')"
                          class="btn btn-icon icon-left btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></i>
                          Hapus</button>
                      </form>
                    </td>
                  </tr>
                @endforeach --}}
              </tbody>
            </table>
          </div>
        </div>
      @endsection

      @push('scripts')
        <!-- JS Libraies -->

        <!-- Page Specific JS File -->
      @endpush
