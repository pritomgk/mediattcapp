<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\course;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    
    public function add_students_manually(){
        
        $courses = course::all();
        
        return view('admin_view.common.add_students_manually', compact('courses'));

    }

    public function add_students_manually_info(Request $request){

        $request->validate(
            [
            "fname" => "required",
            "lname" => "required",
            // "phone" => "required",
            // "email" => "required|email",
            // "father_name" => "required",
            // "birth_date" => "required",
            // "mother_name" => "required",
            "ssc_roll_no" => "required",
            // "hsc_roll_no" => "required",
            // "nid_num" => "required|numeric",
            // "ssc_year" => "required",
            // "hsc_year" => "required",
            // "ssc_from" => "required",
            // "hsc_from" => "required",
            // "ssc_regi_no" => "required",
            // "hsc_regi_no" => "required",
            // "ssc_grade" => "required",
            // "hsc_grade" => "required",
            "gender" => "required",
            "course_id" => "required",
            "course_start" => "required",
            "course_end" => "required",
            // "address" => "required",
            // "password"=> "required|min:8|max:16",
            // "document"=> "required|max:10240",
            // "official_id_card_image_front"=> "required|max:8192",
            // "official_id_card_image_back"=> "required|max:8192",
            // "confirm_password"=> "required|same:password",
            // "terms_condition"=> "required",
        ]);
        
        $student = new student();

        $document_name = null;

        if (!empty($request->document)) {

            $request->validate([
                "document"=> "required|max:10240",
            ]);

            $first_name = $request->fname;
            $document_name = $first_name.'_document_'.date("Y_m_d_h_i_sa").'.'.$request->file('document')->getClientOriginalExtension();
            $request->file('document')->move(public_path('storage/uploads/document/'), $document_name);


        }

        $student->name = $request->fname.' '.$request->lname;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->birth_date = $request->birth_date;
        $student->ssc_roll_no = $request->ssc_roll_no;
        $student->hsc_roll_no = $request->hsc_roll_no;
        $student->serial_no = $request->serial_no;
        $student->grade = $request->grade;
        $student->certificate_serial = $request->certificate_serial;
        $student->regi_no = $request->regi_no;
        $student->ssc_year = $request->ssc_year;
        $student->hsc_year = $request->hsc_year;
        $student->ssc_from = $request->ssc_from;
        $student->hsc_from = $request->hsc_from;
        $student->ssc_regi_no = $request->ssc_regi_no;
        $student->hsc_regi_no = $request->hsc_regi_no;
        $student->ssc_grade = $request->ssc_grade;
        $student->hsc_grade = $request->hsc_grade;
        $student->gender = $request->gender;
        $student->status = 1;
        $student->course_id = $request->course_id;
        $student->course_start = $request->course_start;
        $student->course_end = $request->course_end;
        $student->address = $request->address;
        $student->document = $document_name;
        $student->role_id = 3;
        $student->save();

        // $subject = 'New application received.';

        // $body = '
        // Hello Sir, <br><br>
        // New application was received. Please check your admission application dashboard. <br> <br>
        // Thank you <br>
        // Media TTC.
        // ';
// 'mttijamalpur@gmail.com'
        // Mail::to('pritomguha62@gmail.com')->send(new SendMail($subject, $body));

        return redirect()->back()->with('success', 'Student Successfully Added..!');

    }

    public function all_active_students(){
        
        $all_active_students = student::where('status', 1)->orderByDesc('course_start')->get();

        $active_student_courses = course::all();
        
        return view('admin_view.common.all_active_students', compact('all_active_students', 'active_student_courses'));

    }

    public function all_deactive_students(){
        
        $all_deactive_students = student::where('status', 0)->get();

        $deactive_student_courses = course::all();
        
        return view('admin_view.common.all_deactive_students', compact('all_deactive_students', 'deactive_student_courses'));

    }

    public function deactivate_student($student_id){
        
        $deactivate_student = student::find($student_id);

        $deactivate_student->status = 0;

        $deactivate_student->update();
        
        return redirect()->back()->with('success', 'Student deactivated..!');

    }

    public function activate_student($student_id){
        
        $activate_student = student::find($student_id);

        $activate_student->status = 1;

        $activate_student->update();
        
        return redirect()->back()->with('success', 'Student admited..!');

    }

    public function delete_student($student_id){
        
        $delete_student = student::find($student_id);
        if ($delete_student->document != '') {
            if (file_exists(public_path('storage/uploads/document/'.$delete_student->document))) {
                unlink(public_path('storage/uploads/document/'.$delete_student->document));
            }
        }
        
        $delete_student->delete();

        return redirect()->back()->with('error', 'Student Deleted..!');

    }

    public function admin_update_student($student_id){
        
        $admin_update_student = student::find($student_id);
        $courses = course::all();
        
        return view('admin_view.common.admin_update_student', compact('admin_update_student', 'courses'));

    }

    public function admin_update_student_info(Request $request){
        
        $request->validate(
            [
            "name" => "required",
            // "father_name" => "required",
            // "birth_date" => "required",
            // "mother_name" => "required",
            // "ssc_roll_no" => "required",
            // "hsc_roll_no" => "required",
            // "nid_num" => "required|numeric",
            // "ssc_year" => "required",
            // "hsc_year" => "required",
            // "ssc_from" => "required",
            // "hsc_from" => "required",
            // "ssc_regi_no" => "required",
            // "hsc_regi_no" => "required",
            // "ssc_grade" => "required",
            // "hsc_grade" => "required",
            "gender" => "required",
            "course_id" => "required",
            // "address" => "required",
            // "password"=> "required|min:8|max:16",
            // "confirm_password"=> "required|same:password",
            // "terms_condition"=> "required",
        ]);

        $existing_student = student::find($request->student_id);
        

        
        if (!empty($request->document)) {
                
        
            $request->validate([
                "document"=> "required|max:10240",
            ]);

            if ($existing_student->document != '') {
                if (file_exists(public_path('storage/uploads/document/'.$existing_student->document))) {
                    unlink(public_path('storage/uploads/document/'.$existing_student->document));
                }
            }
            
            $first_name = $request->fname;
            $document_name = $first_name.'_document_'.date("Y_m_d_h_i_sa").'.'.$request->file('document')->getClientOriginalExtension();

            $existing_student->document = $document_name;
            
            $request->file('document')->move(public_path('storage/uploads/document/'), $document_name);

        }

        $existing_student->name = $request->name;
        $existing_student->phone = $request->phone;
        $existing_student->email = $request->email;
        $existing_student->father_name = $request->father_name;
        $existing_student->mother_name = $request->mother_name;
        $existing_student->birth_date = $request->birth_date;
        $existing_student->serial_no = $request->serial_no;
        $existing_student->roll_no = $request->roll_no;
        $existing_student->ssc_roll_no = $request->ssc_roll_no;
        $existing_student->hsc_roll_no = $request->hsc_roll_no;
        $existing_student->ssc_year = $request->ssc_year;
        $existing_student->hsc_year = $request->hsc_year;
        $existing_student->ssc_from = $request->ssc_from;
        $existing_student->hsc_from = $request->hsc_from;
        $existing_student->certificate_serial = $request->certificate_serial;
        $existing_student->regi_no = $request->regi_no;
        $existing_student->ssc_regi_no = $request->ssc_regi_no;
        $existing_student->hsc_regi_no = $request->hsc_regi_no;
        $existing_student->grade = $request->grade;
        $existing_student->ssc_grade = $request->ssc_grade;
        $existing_student->hsc_grade = $request->hsc_grade;
        $existing_student->gender = $request->gender;
        $existing_student->course_id = $request->course_id;
        $existing_student->course_start = $request->course_start;
        $existing_student->course_end = $request->course_end;
        $existing_student->address = $request->address;
        $existing_student->role_id = 3;
        

        $existing_student->update();

        return redirect()->back()->with('success', 'Student information upadated..!');


    }

    
    public function view_course_students($course_id){
        
        $view_course_students = student::where('course_id', $course_id)->orderByDesc('course_start')->get();

        $course_student_courses = course::all();
        
        return view('admin_view.common.view_course_students', compact('view_course_students', 'course_student_courses'));

    }








}



