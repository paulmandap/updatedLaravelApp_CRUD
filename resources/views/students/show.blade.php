@extends('students.layout')

@section('content')
<style>
    /* Main container styling */
    .container {
        max-width: 85%;
        margin-top: 30px;
        font-family: 'Arial', sans-serif; /* Use a professional, sans-serif font */
        display: flex;
        flex-direction: column;
        align-items: center; /* Centering the items */
    }

    /* Card styling */
    .card {
        margin: 20px;
        border: 1px solid #dddddd; /* Adding border */
        border-radius: 8px; /* Rounded corners */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        width: 100%; /* Make card width 100% of the parent */
        max-width: 600px; /* Limit max width for better appearance */
    }

    /* Card header */
    .card-header {
        background-color: #5D3FD3;
        color: white;
        padding: 15px;
        border-radius: 8px 8px 0 0;
        text-align: center;
        font-weight: bold;
        font-size: 1.5em; /* Change font size of card header */
    }

    /* Card body */
    .card-body {
        padding: 15px;
        color: #333; /* Text color */
    }

    /* Label styling */
    .info-label {
        font-weight: bold; /* Make the labels bold */
    }

    /* Card text styling */
    .card-text {
        font-size: 1em; /* Change font size of card text */
        margin: 10px 0; /* Spacing around text */
        padding-bottom: 10px; /* Padding below text */
        border-bottom: 1px solid #dddddd; /* Separation line */
    }

    /* QR Code styling */
    .qr-code {
        text-align: center; /* Center the QR code */
        margin-top: 20px;
    }

    /* Back button styling */
    .btn-back {
        background-color: #5D3FD3; /* Same color as card header */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none; /* Remove underline */
        display: inline-block; /* Ensure proper spacing */
        margin: 20px 0; /* Space around button */
        transition: background-color 0.3s ease;
    }

    .btn-back:hover {
        background-color: #4c2ea8; /* Darker shade on hover */
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-header">Students Page</div>
        <div class="card-body">
            <p class="card-text"><span class="info-label">Name:</span> {{ $student->name }}</p>
            <p class="card-text"><span class="info-label">Address:</span> {{ $student->address }}</p>
            <p class="card-text"><span class="info-label">Contact:</span> {{ $student->contact }}</p>
            <p class="card-text"><span class="info-label">Course:</span> {{ $student->course }}</p>
            <p class="card-text"><span class="info-label">Year Level:</span> {{ $student->year_level }}</p>
            <p class="card-text"><span class="info-label">Section:</span> {{ $student->section }}</p>
            <p class="card-text"><span class="info-label">Age:</span> {{ $student->age }}</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>QR Code</h2>
        </div>
        <div class="card-body qr-code">
            {!! QrCode::size(300)->generate(route('students.show', $student->id)) !!} <!-- Using $student->id -->
        </div>
    </div>

    <a href="{{ url('/students') }}" class="btn btn-back">Back to Students</a> <!-- Back button -->
</div>
@endsection
