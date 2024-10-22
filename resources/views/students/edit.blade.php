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

    /* Form group styling */
    .form-group {
        width: 100%; /* Make form group width 100% */
        margin-bottom: 15px; /* Spacing below form groups */
    }

    /* Label styling */
    label {
        font-weight: bold; /* Make labels bold */
        margin-bottom: 5px; /* Space below label */
    }

    /* Input styling */
    .form-control {
        border: 1px solid #dddddd; /* Adding border */
        border-radius: 5px; /* Rounded corners */
        padding: 10px; /* Padding inside input */
        width: calc(100% - 22px); /* Full width minus padding */
    }

    /* Button styling */
    .btn-primary {
        background-color: #5D3FD3; /* Match card header color */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        margin-top: 20px; /* Space above the button */
    }

    .btn-primary:hover {
        background-color: #4c2ea8; /* Darker shade on hover */
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-header">Edit Student</div>
        <div class="card-body">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" placeholder="Enter Name" required>
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $student->address }}" placeholder="Enter Address" required>
                </div>

                <div class="form-group">
                    <label for="contact">Contact:</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="{{ $student->contact }}" placeholder="Enter Contact" required>
                </div>

                <div class="form-group">
                    <label for="course">Course</label>
                    <input type="text" name="course" class="form-control" value="{{ old('course', $student->course ?? '') }}" required>
                </div>

                <div class="form-group">
                    <label for="year_level">Year Level</label>
                    <input type="text" name="year_level" class="form-control" value="{{ old('year_level', $student->year_level ?? '') }}" required>
                </div>

                <div class="form-group">
                    <label for="section">Section</label>
                    <input type="text" name="section" class="form-control" value="{{ old('section', $student->section ?? '') }}" required>
                </div>

                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" name="age" class="form-control" value="{{ old('age', $student->age ?? '') }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Student</button>
            </form>
        </div>
    </div>
</div>
@endsection
