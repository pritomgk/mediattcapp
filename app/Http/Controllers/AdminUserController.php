<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\admin_user;
use App\Models\course;
use App\Models\role;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminUserController extends Controller
{

    public function dashboard(){

        $courses_count = course::all()->count();

        $active_students = student::where('status', 1)->get()->count();

        $deactive_students = student::where('status', 0)->get()->count();

        // $courses = course::all();
        
        if (session()->get('role_id') == 1) {
            return view('admin_view.admin.dashboard', compact('courses_count', 'active_students', 'deactive_students'));
        }elseif (session()->get('role_id') == 2) {
            return view('admin_view.teacher.dashboard', compact('courses_count', 'active_students', 'deactive_students'));
        }


    }

    public function admin_register(){

        return view('admin_view.common.admin_register');

    }

    public function admin_register_apply(Request $request){

        $request->validate(
            [
            "fname" => "required",
            "lname" => "required",
            "phone" => "required",
            "email" => "required|email",
            "hsc_roll_no" => "required",
            "password"=> "required|min:8|max:16",
            "repassword"=> "required|same:password",
        ]);

        $verify_token = rand(100000,999999);

        session()->put('verify_token', $verify_token);

        $admin_user = new admin_user();
        $admin_user->name = $request->fname.' '.$request->lname;
        $admin_user->phone = $request->phone;
        $admin_user->email = $request->email;
        $admin_user->father_name = $request->father_name;
        $admin_user->gender = $request->gender;
        $admin_user->course_id = $request->course_id;
        $admin_user->address = $request->address;
        $admin_user->role_id = 2;
        $admin_user->verify_token = $verify_token;
        $admin_user->password = Hash::make($request->password);
        $admin_user->save();
        
        session()->put('email', $request->email);
        
        $subject = 'New admin request received.';

        $body = '
        Hello Sir, <br><br>
        New admin request was received. Please check your admin request dashboard. <br> <br>
        Thank you <br>
        MediaTTC.
        ';

        Mail::to('mttijamalpur@gmail.com')->send(new SendMail($subject, $body));
        
        $subject_admin_request = 'Mail verification request.';

        
        $body_admin_request = '
        Hello Sir, <br><br>
        Your otp is <br><br>'.$verify_token.' <br> <br>
        Provide the otp to verify account. <br>
        Thank you, <br>
        MediaTTC.
        ';

        Mail::to($admin_user->email)->send(new SendMail($subject_admin_request, $body_admin_request));

        return redirect(route('verify_token', ['email'=>$request->email]))->with('success', 'Admin Request Submited..!');


    }

    public function verify_token(){

        if (session()->get('email_verified') !== 1) {
            $admin_user = admin_user::where('email', session()->get('email'))->first();
        
            $verify_token = rand(100000,999999);

            session()->put('verify_token', $verify_token);

            $admin_user->verify_token = $verify_token;

            $admin_user->save();

            $subject_admin_request = 'Mail verification request.';

            
            $body_admin_request = '
            Hello Sir, <br><br>
            Your otp is <br><br>'.$verify_token.' <br> <br>
            Provide the otp to verify account. <br>
            Thank you, <br>
            MediaTTC.
            ';

            Mail::to($admin_user->email)->send(new SendMail($subject_admin_request, $body_admin_request));

        }

        return view('admin_view.common.verify_token');

    }

    public function token_verification(Request $request){

        if (!empty($request->email)) {
            $email_token_submit = Admin_user::where('email', $request->email)->where('verify_token', $request->token)->update([ 'email_verified' => 1 ]);
        
            if($email_token_submit){
                
                session()->put('email_verified', 1);
                session()->forget('verify_token');

                return redirect(route('login'))->with('success', 'Email successfully verified. You will be notified by email if your registration is approved or not..!');
            }else {
                return redirect(route('login'))->with('error', 'Email can not be verified, please retry..!');
            }
        }else {
            $email_token_submit = Admin_user::where('email', session()->get('email'))->where('verify_token', session()->get('token'))->update([ 'email_verified' => 1 ]);
        
            if($email_token_submit){
                
                session()->put('email_verified', 1);
                session()->forget('verify_token');

                return redirect(route('login'))->with('success', 'Email successfully verified. You will be notified by email if your registration is approved or not..!');
            }else {
                return redirect(route('login'))->with('error', 'Email can not be verified, please retry..!');
            }
        }

    }
    
    public function all_admin_courses(){

        $all_admin_courses = course::all();

        return view('admin_view.common.all_admin_courses', compact('all_admin_courses'));

    }





    

}



