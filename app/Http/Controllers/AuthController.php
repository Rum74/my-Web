<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin-login');
    }
    public function check_login(Request $request)
    {
        $this->validation($request);
        $email = $request->email;
        $password = $request->password;
        $admin = Admin::where([
            'email' => $email,
            'password' => md5($password)
        ])->first();
        if ($admin) {
            Auth::login($admin);
            return Redirect::to('/admin/dashboard');
        } else {
            Session::flash('error', 'Bạn nhập sai email hoặc mật khẩu');
            return Redirect::to('/admin/login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return Redirect::to('admin/login');
    }
    public function validation($request)
    {
        return $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|max:255'
        ]);
    }
}
