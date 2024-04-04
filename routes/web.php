<?php

use App\Http\Controllers\AdminUserController;
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

Route::post('/contact_message', [PubController::class, 'contact_message']
)->name('contact_message');

Route::get('/admission', [PubController::class, 'admission']
)->name('admission');

Route::post('/admission_apply', [PubController::class, 'admission_apply']
)->name('admission_apply');

// login logout 

Route::get('/login', function () {
    return view('public_view.login');
})->name('login');

Route::post('/check_login', [LoginoutController::class, 'check_login']
)->name('check_login');

Route::get('/logout', [LoginoutController::class, 'logout']
)->name('logout');



// admin_panel routes


Route::get('/admin_panel/admin_register', [AdminUserController::class, 'admin_register']
)->name('admin_register');

Route::post('/admin_panel/admin_register_apply', [AdminUserController::class, 'admin_register_apply']
)->name('admin_register_apply');

Route::post('/admin_panel/verify_token', [AdminUserController::class, 'verify_token']
)->name('verify_token')->middleware('verify_token');

Route::post('/admin_panel/token_verification', [AdminUserController::class, 'token_verification']
)->name('token_verification');

Route::prefix('/admin_panel')->middleware('admin_teacher')->group(function () {
    
    Route::get('/', function () {
        if (session()->get('role_id') == 1) {
            return redirect()->route('admin_dashboard');
        }elseif (session()->get('role_id') == 2) {
            return redirect()->route('teacher_dashboard');
        }
    })->name('dashboard')->middleware('email_verified');

    Route::get('/admin/dashboard', function () {
        return view('admin_view.admin.dashboard');
    })->name('admin_dashboard')->middleware('email_verified');

    Route::get('/teacher/dashboard', function () {
        return view('admin_view.teacher.dashboard');
    })->name('teacher_dashboard')->middleware('email_verified');



});



