<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Route lama dialihkan supaya link di navbar atau halaman lain tidak error
Route::redirect('/kursus', '/courses')->name('catalog.index');
Route::redirect('/pendaftaran', '/enrollments/create');

// Enrollment (relasi Participant - Course)
Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
Route::get('/enrollments/create', [EnrollmentController::class, 'create'])->name('enrollments.create');
Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');

// Cek sisa kuota kursus (JSON)
Route::get('/courses/{course}/availability', function (int $course) {
    $availability = [
        1 => ['course' => 'Web Dasar', 'remaining' => 12],
        2 => ['course' => 'PHP Dasar', 'remaining' => 8],
        3 => ['course' => 'Laravel Dasar', 'remaining' => 4],
    ];

    abort_unless(isset($availability[$course]), 404);

    return response()->json($availability[$course]);
})->name('courses.availability');

// CRUD kursus dari database
Route::resource('courses', CourseController::class);