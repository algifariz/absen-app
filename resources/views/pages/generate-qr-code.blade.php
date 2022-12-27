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

      <div class="row">
        <div class="col-12 ">
          <div class="card">
            <form class="d-flex justify-content-center flex-column" action="{{ url('/generate-qr-code-guru') }}"
              method="POST">
              @csrf
              @method('POST')
              <div class="col-12">
                <div class="card-header">
                  <h4>Generate QR Code</h4>
                </div>
                <div class="card-body col-8 mx-auto">
                  <div class="form-group">
                    <label for="guru_id">Guru</label>
                    <select class="form-control" name="guru_id">
                      <option value="">Pilih Data Guru</option>
                      @foreach ($guru as $g)
                        <option value="{{ $g->id }}">
                          {{ $g->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit">Generate</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      @if (!empty($qrCodeData) && !empty($namaGuru) && !empty($nuptk))
        <div class="row">
          <div class="col-12 ">
            <div class="card">
              <div class="col-12">
                <div class="card-header">
                  <h4>Informasi QR Code Akan Muncul Di Sini</h4>
                </div>
                <div id="print-section">
                  <div class="card-body d-flex align-items-center justify-item-center">
                    <div>
                      {{ $qrCodeData }}
                    </div>
                    <div class="ml-3">
                      <h2 class="mb-0">{{ $nuptk }}</h2>
                      <p class="mb-0">Nama Guru: {{ $namaGuru }}</p>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-success" onclick="printSection()">Print</button>
                </div>

              </div>
            </div>
          </div>
        </div>
      @endif
    @endsection

    {{-- Add custom script javascript --}}
    @push('script')
      <script>
        function printSection() {
          var printContents = document.getElementById('print-section').innerHTML;
          var originalContents = document.body.innerHTML;
          document.body.innerHTML = printContents;
          window.print();
          document.body.innerHTML = originalContents;
        }
      </script>
