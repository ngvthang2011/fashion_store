<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function getLogin() {
        echo "Trang Login";
    }

    public function getIndex() {
        echo "Trang chủ quản trị!";
    }
}
