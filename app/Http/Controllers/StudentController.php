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

        $subject = 'New application received.';

        $body = '
        Hello Sir, <br><br>
        New application was received. Please check your admission application dashboard. <br> <br>
        Thank you <br>
        Media TTC.
        ';
// 'mttijamalpur@gmail.com'
        Mail::to('pritomguah62@gmail.com')->send(new SendMail($subject, $body));

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

    public function delete_student_info(){
        
        $activate_student = student::where('status', 0)->get();
        
        return view('admin_view.common.all_deactive_students', compact('all_deactive_students'));

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
            "father_name" => "required",
            "birth_date" => "required",
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
            "address" => "required",
            // "password"=> "required|min:8|max:16",
            // "official_id_card_image_front"=> "required|max:8192",
            // "official_id_card_image_back"=> "required|max:8192",
            // "confirm_password"=> "required|same:password",
            // "terms_condition"=> "required",
        ]);

        $existing_studnet = student::find($request->student_id);
        

        
        if (!empty($request->document)) {
                
        
            $request->validate([
                "document"=> "required|max:10240",
            ]);

            if (!empty($existing_studnet->document)) {
                unlink(public_path('storage/uploads/documet/'.$existing_studnet->document));
            }
            
            $first_name = $request->fname;
            $docment_name = $first_name.'_document_'.date("Y_m_d_h_i_sa").'.'.$request->file('document')->getClientOriginalExtension();
            $request->file('document')->storeAs('public/uploads/document', $docment_name);

            $existing_studnet->document = $docment_name;
        }

        $existing_studnet->name = $request->name;
        $existing_studnet->phone = $request->phone;
        $existing_studnet->email = $request->email;
        $existing_studnet->father_name = $request->father_name;
        $existing_studnet->mother_name = $request->mother_name;
        $existing_studnet->birth_date = $request->birth_date;
        $existing_studnet->serial_no = $request->serial_no;
        $existing_studnet->roll_no = $request->roll_no;
        $existing_studnet->ssc_roll_no = $request->ssc_roll_no;
        $existing_studnet->hsc_roll_no = $request->hsc_roll_no;
        $existing_studnet->ssc_year = $request->ssc_year;
        $existing_studnet->hsc_year = $request->hsc_year;
        $existing_studnet->ssc_from = $request->ssc_from;
        $existing_studnet->hsc_from = $request->hsc_from;
        $existing_studnet->certificate_serial = $request->certificate_serial;
        $existing_studnet->regi_no = $request->regi_no;
        $existing_studnet->ssc_regi_no = $request->ssc_regi_no;
        $existing_studnet->hsc_regi_no = $request->hsc_regi_no;
        $existing_studnet->grade = $request->grade;
        $existing_studnet->ssc_grade = $request->ssc_grade;
        $existing_studnet->hsc_grade = $request->hsc_grade;
        $existing_studnet->gender = $request->gender;
        $existing_studnet->course_id = $request->course_id;
        $existing_studnet->address = $request->address;
        $existing_studnet->role_id = 3;
        

        $existing_studnet->update();

        return redirect()->back()->with('success', 'Student information upadated..!');


    }







}



