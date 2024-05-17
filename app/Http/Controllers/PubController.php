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
    
    public function home(){

        $courses_latest = course::orderBy('create_time', 'desc')->take(6)->get();
        return view('public_view.home', compact('courses_latest'));

    }
    
    
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
            "birth_date" => "required",
            // "mother_name" => "required",
            "ssc_roll_no" => "required",
            // "hsc_roll_no" => "required",
            // "nid_num" => "required|numeric",
            "ssc_year" => "required",
            // "hsc_year" => "required",
            "ssc_from" => "required",
            // "hsc_from" => "required",
            "ssc_regi_no" => "required",
            // "hsc_regi_no" => "required",
            "ssc_grade" => "required",
            // "hsc_grade" => "required",
            "gender" => "required",
            "course_id" => "required",
            "address" => "required",
            "password"=> "required|min:8|max:16",
            // "official_id_card_image_front"=> "required|max:8192",
            // "confirm_password"=> "required|same:password",
            // "terms_condition"=> "required",
        ]);

        $existing_student = student::where('ssc_roll_no', $request->ssc_roll_no)->where('course_id', $request->course_id)->first();
        

        if (!empty($existing_student)) {

            if (!empty($request->document)) {
                
        
                $request->validate([
                    "document"=> "required|max:10240",
                ]);

                if (!empty($existing_student->document)) {
                    
                    if (file_exists(public_path('storage/uploads/document/'.$existing_student->document))) {
                        unlink(public_path('storage/uploads/document/'.$existing_student->document));
                    }
                }
                
                $first_name = $request->fname;
                $docment_name = $first_name.'_document_'.date("Y_m_d_h_i_sa").'.'.$request->file('document')->getClientOriginalExtension();
                $request->file('document')->move('public/uploads/document', $docment_name);

                $existing_student->document = $docment_name;
            }

            $existing_student->name = $request->fname.' '.$request->lname;
            $existing_student->phone = $request->phone;
            $existing_student->email = $request->email;
            $existing_student->father_name = $request->father_name;
            $existing_student->mother_name = $request->mother_name;
            $existing_student->birth_date = $request->birth_date;
            $existing_student->hsc_roll_no = $request->hsc_roll_no;
            $existing_student->ssc_year = $request->ssc_year;
            $existing_student->hsc_year = $request->hsc_year;
            $existing_student->ssc_from = $request->ssc_from;
            $existing_student->hsc_from = $request->hsc_from;
            $existing_student->ssc_regi_no = $request->ssc_regi_no;
            $existing_student->hsc_regi_no = $request->hsc_regi_no;
            $existing_student->ssc_grade = $request->ssc_grade;
            $existing_student->hsc_grade = $request->hsc_grade;
            $existing_student->gender = $request->gender;
            $existing_student->course_id = $request->course_id;
            $existing_student->address = $request->address;
            $existing_student->role_id = 3;
            
            if ($existing_student->ssc_regi_no == $request->ssc_regi_no) {
                $existing_student->password = Hash::make($request->password);
            }

            $existing_student->update();
    
        }else{
            
            $student = new student();
            
            if (!empty($request->document)) {
        
                $request->validate([
                    "document"=> "required|max:10240",
                ]);
                
                $first_name = $request->fname;
                $docment_name = $first_name.'_document_'.date("Y_m_d_h_i_sa").'.'.$request->file('document')->getClientOriginalExtension();
                $request->file('document')->move('public/uploads/document', $docment_name);
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
            $student->save();
    
            $subject = 'New application received.';
    
            $body = '
            Hello Sir, <br><br>
            New application was received. Please check your admission application dashboard. <br> <br>
            Thank you <br>
            Media TTC.
            ';

    // 'mttijamalpur@gmail.com'

            Mail::to('mttijamalpur@gmail.com')->send(new SendMail($subject, $body));
        }

        return redirect()->back()->with('success', 'Application Successfully Submited..!');

    }


    public function result(){

        $courses = course::all();

        return view('public_view.result', compact('courses'));

    }
    

    public function result_check(Request $request){

        $result_check = student::where('certificate_serial', $request->certificate_serial)->where('course_id', $request->course_id)->where('grade', '!=', '')->first();

        $courses = course::all();

        if (!empty($result_check->name)) {
            
            return view('public_view.result', compact('result_check', 'courses'));
            // return redirect()->route('result', ['result_check'=>$result_check, 'courses'=>$courses]);

        }else{
            return redirect()->back()->with('error', 'Result not found!');
        }


    }
    

    public function institution_result_course(){


        $view_courses = course::all();

            
        return view('public_view.institution_result_course', compact('view_courses'));



    }
    

    public function institution_result($course_id){

        if (empty($course_id)) {
            return redirect()->back();
        }

        $institution_results = student::where('course_id', $course_id)->where('status', 1)->where('grade', '!=', '')->orderByDesc('course_start')->get();

        $institution_result_courses = course::all();

            
        return view('public_view.institution_result', compact('institution_results', 'institution_result_courses'));



    }
    



}


