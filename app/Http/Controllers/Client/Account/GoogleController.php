<?php

namespace App\Http\Controllers\Client\Account;

use App\Http\Controllers\Client\Mail\ActiveController;
use App\Http\Controllers\Client\Mail\MailLoginController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller{

    public $user;
    public $mail;

    public function __construct(){
        $this->mail = new MailLoginController();
        $this->user = new User();
    }

    public function loginUsingGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle(Request $request){

        try{
            $user = Socialite::driver('google')->user();
        }catch (\Exception $e){
            return redirect()->back();
        }
        $condition    = [
            'email' => $user->getEmail(),
        ];
        $existingUser = $this->user->resetPassword($condition);
        if ($existingUser){

            if ($existingUser->social_id == 0){
                return redirect()
                    ->route('login')
                    ->with('error-login',
                        'Đăng nhập thất bại email này đã tồn tại trong hệ thống. Xin vui lòng nhập Email và Mật khẩu để đăng nhập');
            }else{
                if (Auth::attempt(['email' => $user->getEmail(), 'password' => 'nt-group.com', 'status' => 1])){
                    $this->mail->loginMail();

                    return redirect(session('resetPage') ?? 'tai-khoan')
                        ->with('success',
                            'Đăng nhập thành công và đã gửi email thông báo đăng nhập!');
                }else{
                    return redirect()
                        ->route('login')
                        ->with('error-login',
                            'Tài khoản đang tạm khóa. Xin vui lòng liên hệ admin để được xử lí sớm nhất ! ');
                }
            }
        }else{
            $newUser            = new User;
            $newUser->social_id = 1;
            $newUser->password  = Hash::make('nt-group.com');
            $newUser->fullname = $user->getName().' - Google';
            $newUser->slug      = Str::slug($user->getName().' - Google');
            $newUser->id_role  = 3;
            $newUser->status   = 1;
            $newUser->gender   = 'Nam';
            $newUser->token    = strtoupper(Str::random(10));
            $newUser->email    = $user->getEmail();
            $newUser->address  = 'Đang cập nhật';
            $newUser->wallet   = 0;
            $newUser->phone    = '';
            $newUser->save();
            auth()->login($newUser, TRUE);
            $this->mail->loginMail();
            return redirect(session('resetPage') ?? 'tai-khoan')->with('status',
                'Đăng nhập thành công và đã gửi email thông báo!');


        }

    }
}
