<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function single_course($course_id){

        $single_course = course::find($course_id);
        return view('public_view.course-single', compact('single_course'));

    }

    public function all_courses(){

        $all_courses = course::all();
        return view('public_view.all_courses', compact('all_courses'));

    }

    public function header_courses(){

        $header_courses = course::all();
        return view('public_view.app', compact('header_courses'));

    }

}
