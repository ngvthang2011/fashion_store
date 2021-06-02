<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use DB;

class LoginController extends Controller
{
    public function getLogin() {
        return view('backend.login.login');
    }

    public function postLogin(LoginRequest $request) {   
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            return redirect('admin');
        }else{
            return redirect('login')->withInput()->with('alert','Thông tin tài khoản hoặc mật khẩu không chính xác!');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('login');
    }

    public function getIndex() {
        return view('backend.index');
    }
}
