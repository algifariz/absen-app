@extends('layouts.app')

@section('title', $title)

@push('style')
  <!-- CSS Libraries -->
@endpush

@section('main')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Data Tunjangan</h1>
      </div>
      {{-- show status --}}
      @if (session()->has('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      <div class="card-header">
        <a href="/tambah-data-tunjangan"class="btn btn-icon icon-left btn-primary mb-2"><i class="fa fa-plus"
            aria-hidden="true"></i></i> Tambah Data Tunjangan</a>
        <div class="card">
          <div class="card-header">
            <h4>Data Tunjangan</h4>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">NO</th>
                  <th scope="col">Nama Tingkatan</th>
                  <th scope="col">Besar Tunjangan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tunjangan as $t)
                  <tr>
                    <th scope="row">{{ $t->id }}</th>
                    <td>{{ $t->tingkatan->nama }}</td>
                    <td>Rp {{ number_format($t->besar_tunjangan, 0, ',', '.') }}</td>
                    <td>
                      <a href="/edit-data-tunjangan/{{ $t->id }}" class="btn btn-icon icon-left btn-primary"><i
                          class="far fa-edit"></i>Edit</a>
                      <form action="/hapusTunjangan/{{ $t->id }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')"
                          class="btn btn-icon icon-left btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></i>
                          Hapus</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

      @endsection

      @push('scripts')
        <!-- JS Libraies -->

        <!-- Page Specific JS File -->
      @endpush
