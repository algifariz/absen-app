@extends('layouts.app')

@section('title',$title)

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
                            
                        </div>
            </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
