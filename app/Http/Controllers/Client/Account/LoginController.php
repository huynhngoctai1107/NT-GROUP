<?php

namespace App\Http\Controllers\Client\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{

    function login(){
        return view('client.pages.login');
    }

    function loginForm(LoginRequest $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1, 'social_id' => 0])){
            $acout = Auth::user();
            if ($acout->id_role == 3){
                return redirect('/')->with('status',
                    'Đăng nhập thành công và đã gửi email thông báo!');

            }else{
                return redirect('/admin/')->with('status',
                    'Đăng nhập thành công email xác nhận đã lỗi!');
            }
        }else{
            return Redirect()
                ->back()
                ->withInput($request->input())
                ->with('error-login', 'Đăng nhập thất bại vui lòng kiểm tra thông tin đăng nhập');
        }

    }

    function logout(){
        Auth::logout();

        return Redirect()->route('login')->with('success', 'Đăng xuất thành công');
    }
}
