<?php

namespace App\Http\Controllers\Client\Account;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Client\Mail\MailLoginController;
use App\Http\Requests\Account\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3 ;

class LoginController extends Controller{
    public $mail;
    public function __construct(){
        $this->mail = new MailLoginController();
    }
    public function login(){
        session('resetPage', Route::current()->getName()) ;

        return view('client.pages.login');
    }

    public function loginForm(LoginRequest $request){
        $score = RecaptchaV3::verify($request->get('g-recaptcha-response'));
        if ($score > 0.7){
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1, 'social_id' => 0])){
                $acout = Auth::user();
                $this->mail->loginMail();

                if ($acout->id_role == 3){
                    return redirect(session('resetPage') ?? 'tai-khoan')->with('success',
                        'Đăng nhập thành công và đã gửi email thông báo đăng nhập!');

                }else{
                    return redirect()->route(session('resetPage') ?? 'dashboar')->with('success',
                        'Đăng nhập thành công và đã gửi email thông báo đăng nhập!');
                }
            }else{
                return Redirect()
                    ->back()
                    ->withInput($request->input())
                    ->with('error-login',
                        'Đăng nhập thất bại vui lòng kiểm tra thông tin đăng nhập');
            }
        }else{
            return Redirect()
                ->back()
                ->withInput($request->input())
                ->with('error-login',
                    'Có thể bạn là robot');

        }
    }
    public function logout(){
        Auth::logout();
        session()->flush();
        return Redirect()->route('login')->with('success', 'Đăng xuất thành công');
    }


}
