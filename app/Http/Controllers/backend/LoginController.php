<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function getLogin() {
        return view('backend.login.login');
    }

    public function postLogin(LoginRequest $request) {
        
        if($request->email == 'admin@gmail.com' && $request->password == '123456'){ 
            return redirect('admin');
        }else{
            return redirect('login')->withInput();
        }
    }

    public function logout() {
        return redirect('login');
    }

    public function getIndex() {
        return view('backend.index');
    }
}
