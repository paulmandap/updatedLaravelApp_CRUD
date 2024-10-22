@extends('layout')

@section('content')
    <div class="container">
        <h2>QR Code Display</h2>
        <!-- Display the QR code passed from the controller -->
        <div class="text-center">
            <img src="data:image/png;base64,{{ base64_encode($qrcode) }}" alt="QR Code">
        </div>
    </div>
@endsection
