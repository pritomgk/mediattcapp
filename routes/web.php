<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LoginoutController;
use App\Http\Controllers\PubController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;



// public page routes 


Route::get('/', [PubController::class, 'home']
)->name('home');

Route::get('/home', function () {
    return redirect()->route('home');
});

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

Route::get('/result', [PubController::class, 'result']
)->name('result');

Route::post('/result_check', [PubController::class, 'result_check']
)->name('result_check');

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

Route::get('/admin_panel/verify_token', [AdminUserController::class, 'verify_token']
)->name('verify_token');

Route::post('/admin_panel/token_verification', [AdminUserController::class, 'token_verification']
)->name('token_verification');

Route::prefix('/admin_panel')->middleware('admin_teacher')->group(function () {
    
    Route::get('/dashboard', [AdminUserController::class, 'dashboard']
    )->name('dashboard')->middleware('email_verified');
    
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    // Route::get('/admin/dashboard', function () {
    //     return view('admin_view.admin.dashboard');
    // })->name('admin_dashboard')->middleware('email_verified');

    // Route::get('/teacher/dashboard', function () {
    //     return view('admin_view.teacher.dashboard');
    // })->name('teacher_dashboard')->middleware('email_verified');

    Route::get('/all_admin_courses', [AdminUserController::class, 'all_admin_courses']
    )->name('all_admin_courses');
    

    Route::get('/add_courses', [CourseController::class, 'add_courses']
    )->name('add_courses');
    

    Route::post('/add_courses_info', [CourseController::class, 'add_courses_info']
    )->name('add_courses_info');
    
    Route::get('/delete_courses_info/{course_id}', [CourseController::class, 'delete_courses_info']
    )->name('delete_courses_info');
    
    
    Route::get('/update_courses/{course_id}', [CourseController::class, 'update_courses']
    )->name('update_courses');
    
    
    Route::post('/update_courses_info', [CourseController::class, 'update_courses_info']
    )->name('update_courses_info');


    // students route 

    
    Route::get('/add_students_manually', [StudentController::class, 'add_students_manually']
    )->name('add_students_manually');
    
    
    Route::post('/add_students_manually_info', [StudentController::class, 'add_students_manually_info']
    )->name('add_students_manually_info');
    
    
    Route::get('/all_active_students', [StudentController::class, 'all_active_students']
    )->name('all_active_students');
    
    
    Route::get('/all_deactive_students', [StudentController::class, 'all_deactive_students']
    )->name('all_deactive_students');
    
    
    Route::get('/activate_student/{student_id}', [StudentController::class, 'activate_student']
    )->name('activate_student');
    
    
    Route::get('/deactivate_student/{student_id}', [StudentController::class, 'deactivate_student']
    )->name('deactivate_student');
    
    
    Route::get('/delete_student/{student_id}', [StudentController::class, 'delete_student']
    )->name('delete_student');
        
    Route::get('/admin_update_student/{student_id}', [StudentController::class, 'admin_update_student']
    )->name('admin_update_student');
    
        
    Route::post('/admin_update_student_info', [StudentController::class, 'admin_update_student_info']
    )->name('admin_update_student_info');
    
        
    Route::get('/test_mail', [AdminUserController::class, 'test_mail']
    )->name('test_mail');
    


});



