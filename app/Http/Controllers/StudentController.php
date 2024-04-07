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
            "ssc_grade" => "required",
            // "hsc_grade" => "required",
            "gender" => "required",
            "course_id" => "required",
            // "address" => "required",
            // "password"=> "required|min:8|max:16",
            // "document"=> "required|max:10240",
            // "official_id_card_image_front"=> "required|max:8192",
            // "official_id_card_image_back"=> "required|max:8192",
            // "confirm_password"=> "required|same:password",
            // "terms_condition"=> "required",
        ]);
        
        $student = new student();

        if (!empty($request->document)) {

            $first_name = $request->fname;
            $docment_name = $first_name.'_document_'.date("Y_m_d_h_i_sa").'.'.$request->file('document')->getClientOriginalExtension();
            $request->file('document')->storeAs('public/uploads/document', $docment_name);

            $student->document = $docment_name;

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
        $student->course_id = $request->course_id;
        $student->address = $request->address;
        $student->role_id = 3;
        $student->save();

        // $subject = 'New application received.';

        // $body = '
        // Hello Sir, <br><br>
        // New application was received. Please check your admission application dashboard. <br> <br>
        // Thank you <br>
        // Media TTC.
        // ';

        // Mail::to('mttijamalpur@gmail.com')->send(new SendMail($subject, $body));

        return redirect()->back()->with('success', 'Student Successfully Added..!');

    }

    public function all_active_students(){
        
        $all_active_students = student::where('status', 1)->get();
        
        return view('admin_view.common.all_active_students', compact('all_active_students'));

    }

    public function all_deactive_students(){
        
        $all_deactive_students = student::where('status', 0)->get();
        
        return view('admin_view.common.all_deactive_students', compact('all_deactive_students'));

    }







}



