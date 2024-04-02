<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public_view.home');
})->name('home');

Route::get('/single_course/{course_id}', [CourseController::class, 'single_course']
)->name('single_course');

Route::get('/single_course/{course_id}', [CourseController::class, 'single_course']
)->name('single_course');

Route::get('/all_courses', [CourseController::class, 'all_courses']
)->name('all_courses');

Route::get('/header_courses', [CourseController::class, 'header_courses']
)->name('header_courses');
