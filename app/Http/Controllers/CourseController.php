<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

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


    public function add_courses(){

        return view('admin_view.common.add_courses');

    }

    public function add_courses_info(Request $request){

        $request->validate([
            "title" => "required",
            "start_time" => "required",
            "end_time" => "required",
            "start_date" => "required",
            "end_date" => "required",
            "content"=> "required|max:5120",
        ]);
        
        $first_name = $request->title;
        $content_name = null;
        
        if ($request->content != '') {
            $content_name = $first_name.'_content_'.date("Y_m_d_h_i_sa").'.'.$request->file('content')->getClientOriginalExtension();
            $request->file('content')->move('public/uploads/courses', $content_name);
        }

        $course = new course();
        $course->title = $request->title;
        $course->tagline = $request->tagline;
        $course->teacher_name = $request->teacher_name;
        $course->description = $request->description;
        $course->start_time = $request->start_time;
        $course->end_time = $request->end_time;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->content = $content_name;
        $course->save();
        
        return redirect()->back()->with('success', 'Course Successfully Added..!');

    }

    public function delete_courses_info($course_id){

        $delete_course = course::find($course_id);

        if (file_exists(public_path('storage/uploads/courses/'.$delete_course->content))) {
            unlink(public_path('storage/uploads/courses/'.$delete_course->content));
        }

        $delete_course->delete();
        
        return redirect()->back()->with('error', 'Course Successfully Deleted..!');

    }

    public function update_courses($course_id){

        $update_course = course::find($course_id);

        return view('admin_view.common.update_courses', compact('update_course'));

    }
    
    public function update_courses_info(Request $request){

        $request->validate([
            "title" => "required",
            "start_time" => "required",
            "end_time" => "required",
            "start_date" => "required",
            "end_date" => "required",
        ]);
        
        $update_course_info = course::find($request->course_id);
        
        $update_course_info->title = $request->title;
        $update_course_info->tagline = $request->tagline;
        $update_course_info->teacher_name = $request->teacher_name;
        $update_course_info->description = $request->description;
        $update_course_info->start_time = $request->start_time;
        $update_course_info->end_time = $request->end_time;
        
        if (!empty($request->content)) {


            $request->validate([
                "content"=> "max:5120",
            ]);

            if (!empty($update_course_info->content)) {
                if (file_exists(public_path('storage/uploads/courses/'.$update_course_info->content))) {
                    unlink(public_path('storage/uploads/courses/'.$update_course_info->content));
                }
            }

            $first_name = $request->title;
            $content_name = $first_name.'_content_'.date("Y_m_d_h_i_sa").'.'.$request->file('content')->getClientOriginalExtension();
            $request->file('content')->move('public/uploads/courses', $content_name);
            $update_course_info->content = $content_name;
        }
        $update_course_info->update();
        
        return redirect()->back()->with('success', 'Course Successfully updated..!');

    }





}


