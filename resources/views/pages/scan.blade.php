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
      <div class="card-header">
        <div class="card">
          <div class="card-header">
            <h4>Arahkan QR Code ke kamera</h4>
          </div>
          <div class="card-body col-6 mx-auto">
            <div id="reader" style="width:100%;"></div>
          </div>
        </div>
      </div>
      <input type="hidden" name="result" id="result">

    @endsection

    @push('scripts')
      <!-- JS Libraies -->
      <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <script>
        function onScanSuccess(decodedText, decodedResult) {
          // handle the scanned code as you like, for example:
          // console.log(`Code matched = ${decodedText}`, decodedResult);

          // Send decodedText to hidden input #result
          $('#result').val(decodedText);
          let id = decodedText;

          // Send value to controller via ajax with csrf using html5qrcodescanner
          html5QrcodeScanner.clear().then(() => {
            $.ajax({
              url: "{{ url('/validasi') }}",
              type: "POST",
              data: {
                "_method": "POST",
                "_token": "{{ csrf_token() }}",
                "qr_code": id
              },
              success: function(response) {
                if (response.status == 200) {
                  Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                  }).then(function() {
                    window.location = "{{ url('/scan') }}";
                  });
                } else {
                  Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                  }).then(function() {
                    window.location = "{{ url('/scan') }}";
                  });
                }
              }
            });
          });
        }

        function onScanFailure(error) {
          // handle scan failure, usually better to ignore and keep scanning.
          // for example:
          console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
          "reader", {
            fps: 10,
            qrbox: {
              width: 250,
              height: 250
            }
          },
          /* verbose= */
          false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
      </script>
      <!-- Page Specific JS File -->
    @endpush
