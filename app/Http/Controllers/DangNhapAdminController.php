<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DangNhapAdminController extends Controller
{

    public function index(){

        return view('admin.login');
    }

    public function checkin(CheckLogin $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('quantri/');
        } else {
            return redirect('/quantri/login')->with('thongbao', 'Tài khoản và mật khẩu không đúng');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/quantri/login');
    }

}
