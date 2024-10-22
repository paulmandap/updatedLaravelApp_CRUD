<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\QrCodeController;
use Illuminate\Support\Facades\Route;

// Redirect root to students index
Route::get('/', function () {
    return redirect('/students'); 
});

// Dummy route for form submission
Route::get('/submit', function () {
    return 'Form submitted successfully!';
});

// Resource route for students
Route::resource('students', StudentController::class);

// Direct route for showing a student (optional since already covered by resource)
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');

// Route for QR code
Route::get('/qrcode', [QrCodeController::class, 'index']);
