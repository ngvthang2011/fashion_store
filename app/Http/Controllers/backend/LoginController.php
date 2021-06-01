<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function getLogin() {
        return view('backend.login.login');
    }

    public function getIndex() {
        return view('backend.index');
    }
}
