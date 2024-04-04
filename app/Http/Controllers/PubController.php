<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\course;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PubController extends Controller
{
    
    public function contact_us(){

        return view('public_view.contact_us');

    }
    
    public function contact_message(Request $request){

        $request->validate([
            "fname" => "required",
            "lname" => "required",
            "phone" => "required",
            "email" => "required|email",
            "message" => "required",
        ]);

        $subject = "A person want to contact with you.";
        $body = 
        '
        Name : '.$request->fname.' '.$request->lname.'
        Email : '.$request->email.'
        Phone : '.$request->phone.'
        Message : '.$request->message;
        Mail::to('mttijamalpur@gmail.com')->send(new SendMail($subject, $body));

    }
    
    public function admission(){

        $courses = course::all();

        return view('public_view.admission', compact('courses'));

    }
    
    public function admission_apply(Request $request){

        $request->validate(
            [
            "fname" => "required",
            "lname" => "required",
            "phone" => "required",
            "email" => "required|email",
            "father_name" => "required",
            // "mother_name" => "required",
            // "ssc_roll_no" => "required",
            "hsc_roll_no" => "required",
            // "nid_num" => "required|numeric",
            // "ssc_year" => "required",
            "hsc_year" => "required",
            // "ssc_from" => "required",
            "hsc_from" => "required",
            // "ssc_regi_no" => "required",
            "hsc_regi_no" => "required",
            // "ssc_grade" => "required",
            "hsc_grade" => "required",
            "gender" => "required",
            "course_id" => "required",
            "address" => "required",
            "password"=> "required|min:8|max:16",
            "document"=> "required|max:5120",
            // "official_id_card_image_front"=> "required|max:8192",
            // "official_id_card_image_back"=> "required|max:8192",
            // "confirm_password"=> "required|same:password",
            // "terms_condition"=> "required",
        ]);

        $first_name = $request->fname;
        $docment_name = $first_name.'_document_'.date("Y_m_d_h_i_sa").'.'.$request->file('document')->getClientOriginalExtension();
        $request->file('document')->storeAs('public/uploads/document', $docment_name);

        $student = new student();
        $student->name = $request->fname.' '.$request->lname;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->ssc_roll_no = $request->ssc_roll_no;
        $student->hsc_roll_no = $request->hsc_roll_no;
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
        $student->password = Hash::make($request->password);
        $student->document = $docment_name;
        $student->save();

        $subject = 'New application received.';

        $body = '
        Hello Sir, <br><br>
        New application was received. Please check your admission application dashboard. <br> <br>
        Thank you <br>
        Media TTC.
        ';

        Mail::to('mttijamalpur@gmail.com')->send(new SendMail($subject, $body));

        return redirect()->back()->with('success', 'Application Successfully Submited..!');

    }

}


