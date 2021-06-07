<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\models\customer;
use Carbon\Carbon;

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
        $month_now = Carbon::now()->format('m');
        $year_now = Carbon::now()->format('Y');
        for($i=1; $i<=$month_now; $i++){
            $months[$i] = 'Tháng '.$i;
            $total_months[$i] = customer::where('state',1)->whereMonth('updated_at',$i)->whereYear('updated_at',$year_now)->sum('total');
        }
        $data['months'] = $months;
        $data['total_months'] = $total_months;
        $data['total'] = customer::where('state',1)->count();
        return view('backend.index',$data);
    }
}
