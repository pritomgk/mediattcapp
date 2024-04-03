<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginoutController;
use App\Http\Controllers\PubController;
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

Route::get('/contact_us', [PubController::class, 'contact_us']
)->name('contact_us');

Route::get('/contact_message', [PubController::class, 'contact_message']
)->name('contact_message');

Route::get('/login', function () {
    return view('public_view.login');
})->name('login');

Route::post('/check_login', [LoginoutController::class, 'check_login']
)->name('check_login');

Route::get('/logout', [LoginoutController::class, 'logout']
)->name('logout');


// admin_panel routes

Route::prefix('/admin_panel')->middleware('admin_teacher')->group(function () {
    
    Route::get('/teacher/dashboard', function () {
        return view('admin_view.teacher.dashboard');
    })->name('teacher_dashboard');



});



