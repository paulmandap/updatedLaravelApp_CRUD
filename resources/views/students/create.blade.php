@extends('layout')

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
        margin-left: 20px; /* Space to the left of the button */
    }

    .btn-primary:hover {
        background-color: #4c2ea8; /* Darker shade on hover */
    }

    /* Back button styling */
    .btn-back {
        background-color: #f44336; /* Red color for back button */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none; /* Remove underline */
        display: inline-block; /* Ensure proper spacing */
        transition: background-color 0.3s ease;
    }

    .btn-back:hover {
        background-color: #d32f2f; /* Darker shade on hover */
    }

    /* Button container styling */
    .button-container {
        display: flex; /* Align buttons horizontally */
        justify-content: space-between; /* Space out buttons */
        width: 100%; /* Full width for button container */
        margin-top: 20px; /* Space above buttons */
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-header">Create a New Student</div>
        <div class="card-body">
            <form action="{{ route('students.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter student's name" required>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter student's address" required>
                </div>

                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" name="contact" class="form-control" placeholder="Enter student's contact" required>
                </div>

                <div class="form-group">
                    <label for="course">Course</label>
                    <input type="text" name="course" class="form-control" placeholder="Enter student's course" required>
                </div>

                <div class="form-group">
                    <label for="year_level">Year Level</label>
                    <input type="text" name="year_level" class="form-control" placeholder="Enter student's year level" required>
                </div>

                <div class="form-group">
                    <label for="section">Section</label>
                    <input type="text" name="section" class="form-control" placeholder="Enter student's section" required>
                </div>

                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" name="age" class="form-control" placeholder="Enter student's age" required>
                </div>

                <div class="button-container">
                    <a href="{{ url('/students') }}" class="btn btn-back">Back</a> <!-- Back button -->
                    <button type="submit" class="btn btn-primary">Submit</button> <!-- Submit button -->
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
