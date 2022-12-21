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
      <div class="card-header">
        <div class="card">
          <div class="card-header">
            <h4>Data Rekap Absen</h4>
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
                <tr>
                  <th scope="row">1</th>
                  <td colspan="3">Infasing </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <a href="#" class="btn btn-icon icon-left btn-info"><i class="fas fa-info-circle"></i> Info</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      @endsection

      @push('scripts')
        <!-- JS Libraies -->

        <!-- Page Specific JS File -->
      @endpush
