<?php

namespace App\Http\Controllers;

use App\Models\admin_user;
use App\Models\role;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginoutController extends Controller
{
    
    public function check_login(Request $request){
        $request->validate(
            [
            "email" => "required|email",
            "password"=> "required|min:8|max:16",
        ]);
        $email = $request->email;
        $password = $request->password;

        $admin_user = admin_user::where('email', $email)->first();
        $student = student::where('email', $email)->first();
        
        if (!empty($admin_user) && Hash::check($password, $admin_user->password)) {
            if ($request->rememberme == 'on') {
                setcookie('email', $request->email, time() + 60*60*24*50);
                setcookie('password', $request->password, time() + 60*60*24*50);
            }else {
                setcookie('email', $request->email, time() - 30);
                setcookie('password', $request->password, time() - 30);
            }
            $role = role::find($admin_user->role_id);
            session()->put('admin_id', $admin_user->admin_id);
            session()->put('name', $admin_user->name);
            session()->put('email', $admin_user->email);
            session()->put('role_name', $role->role_name);
            session()->put('role_id', $admin_user->role_id);
            session()->put('email_verified', $admin_user->email_verified);
            session()->put('status', $admin_user->status);

            if ($admin_user->role_id == 1) {
                return redirect(route('dashboard'));
            }elseif ($admin_user->role_id == 2) {
                return redirect(route('dashboard'));
            }elseif ($admin_user->role_id == 3) {
                return redirect(route('home'));
            }
        }elseif (!empty($student) && Hash::check($password, $student->password)) {
            
            if ($request->rememberme == 'on') {
                setcookie('email', $request->email, time() + 60*60*24*50);
                setcookie('password', $request->password, time() + 60*60*24*50);
            }else {
                setcookie('email', $request->email, time() - 30);
                setcookie('password', $request->password, time() - 30);
            }
            $role = role::find($student->role_id);
            session()->put('admin_id', $student->admin_id);
            session()->put('name', $student->name);
            session()->put('email', $student->email);
            session()->put('role_name', $role->role_name);
            session()->put('role_id', $student->role_id);
            session()->put('email_verified', $student->email_verified);
            session()->put('status', $student->status);

            if ($student->role_id == 1) {
                return redirect(route('dashboard'));
            }elseif ($student->role_id == 2) {
                return redirect(route('dashboard'));
            }elseif ($student->role_id == 3) {
                return redirect(route('home'));
            }
        }else{

            return redirect(route('login'))->with('error', 'Incorrect Email or Password..!');

        }

    }
    
    public function logout(){
        session()->flush();
        return redirect(route('home'));
    }
    




}


