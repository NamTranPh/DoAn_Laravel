<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class login extends Controller
{
    public function login()
    {
        return view('/admin/login');
    }
    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('/admin/dashboard');
        }
        else{
            return back()->withErrors(['username' => 'Thông tin đăng nhập không chính xác']);
        }
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
