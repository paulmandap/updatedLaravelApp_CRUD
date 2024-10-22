<?php

namespace App\Http\Controllers;

use App\Models\Student; // Import the Student model
use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all(); // Fetch all students from the database
        $qrCodes = []; // Array to store QR codes for each student

        foreach ($students as $student) {
            $qrCode = new QrCode('http://127.0.0.1:8000/students/' . $student->id); // URL for the student's detail page
            $qrCodeWriter = new PngWriter();
            $result = $qrCodeWriter->write($qrCode);

            // Get the data URI for the QR code
            $dataUri = $result->getDataUri();
            $qrCodes[$student->id] = $dataUri; // Store the data URI in the array
        }

        return view('students.index', compact('students', 'qrCodes')); // Return the view with the students data and QR codes
    }

    // Other methods remain unchanged
    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
{
    $student = new Student();
    $student->name = $request->input('name');
    $student->address = $request->input('address');
    $student->contact = $request->input('contact');
    $student->course = $request->input('course');
    $student->year_level = $request->input('year_level');
    $student->section = $request->input('section');
    $student->age = $request->input('age');
    $student->save();

    return redirect()->route('students.index');
}


    public function show(string $id)
    {
        $student = Student::findOrFail($id); // Fetch the student by ID
        return view('students.show', compact('student')); // Return the student view
    }

    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);
        $student->name = $request->input('name');
        $student->address = $request->input('address');
        $student->contact = $request->input('contact');
        $student->course = $request->input('course');
        $student->year_level = $request->input('year_level');
        $student->section = $request->input('section');
        $student->age = $request->input('age');
        $student->save();

        return redirect()->route('students.index');
    }

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index');
    }
}
