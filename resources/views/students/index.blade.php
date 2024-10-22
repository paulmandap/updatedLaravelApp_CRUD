@extends('students.layout')

@section('content')
    <style>
        /* Main container styling */
        .container {
            max-width: 85%;
            margin-top: 30px;
            font-family: 'Arial', sans-serif;
        }

        /* Card header */
        .card-header {
            background-color: #5D3FD3;
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .card-header h2 {
            font-size: 1.9em;
            font-weight: bold;
            margin: 0;
            letter-spacing: 0.5px;
        }

        /* Button styles */
        .btn-success {
            background-color: #5D3FD3;
            border: none;
            color: white;
            padding: 8px 16px;
            font-size: 1em;
            transition: background-color 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
        }
        .btn-success:hover {
            background-color: #4c2ea8;
        }
        .btn-info, .btn-primary, .btn-danger {
            background-color: #5D3FD3;
            border: none;
            color: white;
            font-size: 0.9em;
            padding: 6px 12px;
            margin: 0 2px;
        }
        .btn-info:hover, .btn-primary:hover, .btn-danger:hover {
            background-color: #4c2ea8;
        }

        /* Table styling */
        .table {
            margin-top: 20px;
            background-color: #ffffff;
            border-collapse: collapse;
            width: 100%;
        }
        .table, .table th, .table td {
            border: 1px solid #dddddd;
        }
        .table thead {
            background-color: #f0f0f0;
        }
        .table thead th {
            font-size: 0.95em;
            text-transform: uppercase;
            color: #5D3FD3;
            letter-spacing: 0.05em;
            padding: 12px;
        }
        .table tbody tr {
            border-bottom: 1px solid #dddddd;
        }
        .table tbody tr:hover {
            background-color: #fafafa;
        }
        .table td {
            padding: 15px;
            vertical-align: middle;
            font-size: 1.0em;
            color: #333;
        }
        .table img {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 2px;
        }

        /* Table Actions */
        .btn-sm {
            font-size: 0.8em;
            padding: 6px 10px;
        }

        /* Additional styling */
        .fa {
            margin-right: 5px;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Student Management System</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/students/create') }}" class="btn btn-success mb-3">
                            <i class="fa fa-plus"></i> Add New Student
                        </a>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Course</th>
                                        <th>Year Level</th>
                                        <th>Section</th>
                                        <th>Age</th>
                                        <th>QR Code</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->address }}</td>
                                            <td>{{ $item->contact }}</td>
                                            <td>{{ $item->course }}</td>
                                            <td>{{ $item->year_level }}</td>
                                            <td>{{ $item->section }}</td>
                                            <td>{{ $item->age }}</td>
                                            <td>
                                                <img src="{{ $qrCodes[$item->id] }}" alt="QR Code for {{ $item->name }}" style="width: 100px; height: 100px;"/>
                                            </td>
                                            <td>
                                                <a href="{{ url('/students/' . $item->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i> View
                                                </a>
                                                <a href="{{ url('/students/' . $item->id . '/edit') }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o"></i> Edit
                                                </a>
                                                <form method="POST" action="{{ url('/students/' . $item->id) }}" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                        <i class="fa fa-trash-o"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
