@extends('layouts.app')

@section('title', $title)

@push('style')
  <!-- CSS Libraries -->
@endpush

@section('main')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Data Tingkatan Honor</h1>
      </div>
      {{-- show status --}}
      @if (session()->has('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif
      <div class="card-header">
        <a href="tambah-tingkatan"class="btn btn-icon icon-left btn-primary mb-2"><i class="fa fa-plus"
            aria-hidden="true"></i></i> Tambah Tingkatan Honor</a>
        <div class="card">
          <div class="card-header">
            <h4>Data Tingkat Honor</h4>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>


                <tr>
                  <th scope="col">NO</th>
                  <th scope="col" colspan="3">Nama</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tingkatan as $ting)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td colspan="3">{{ $ting->nama }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <a href="/edit-tingkatan/{{ $ting->id }}" class="btn btn-icon icon-left btn-primary"><i
                          class="far fa-edit"></i>
                        Edit</a>
                      <form action="/hapusTingkatan/{{ $ting->id }}" method="POST">
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
