<?php

namespace App\Http\Controllers;

use App\Models\admin_user;
use App\Models\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
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
        
        if (!empty($admin_user) && Hash::check($password, $admin_user->password)) {
            if ($request->rememberme == 'on') {
                setcookie('email', $request->email, time() + 60*60*24*50);
                setcookie('password', $request->password, time() + 60*60*24*50);
            }else {
                setcookie('email', $request->email, time() - 30);
                setcookie('password', $request->password, time() - 30);
            }
            $admin_role = role::find($admin_user->role_id);
            session()->put('admin_id', $admin_user->admin_id);
            session()->put('name', $admin_user->name);
            session()->put('role_name', $admin_role->role_name);
            session()->put('role_id', $admin_user->role_id);
            session()->put('status', $admin_user->status);

            if ($admin_user->role_id == 1) {
                return redirect('admin_panel/admin/dashboard');
            }elseif ($admin_user->role_id == 2) {
                return redirect('admin_panel/teacher/dashboard');
            }elseif ($admin_user->role_id == 3) {
                return redirect('admin_panel/student/dashboard');
            }
        }else {
            return redirect('admin_panel/login')->with('error', 'Incorrect Email or Password..!');
        }

    }








    

}
