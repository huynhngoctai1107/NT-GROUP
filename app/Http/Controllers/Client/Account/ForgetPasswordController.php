<?php

namespace App\Http\Controllers\Client\Account;

use App\Http\Controllers\Client\Mail\ForgetPasswordController as MailForget;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\ForgetPasswordRequest;
use App\Http\Requests\Account\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class ForgetPasswordController extends Controller{

    public $user;
    public $mail;

    public function __construct(){
        $this->user = new User();
        $this->mail = new MailForget();
    }

    function fogetPassword(){
        return view('client.pages.forgetpassword');
    }

    function postForgetPassword(ForgetPasswordRequest $request){
        $condition = [
            'email'     => $request->email,
            'social_id' => 0,
        ];
        $token     = [
            'token' => strtoupper(Str::random(10)),
        ];
        $this->user->updateUser($token, $condition);

        if ($data = $this->user->resetPassword($condition)){
            $this->mail->forgetPassword($data);

            return Redirect()
                ->back()
                ->with('success', 'Đã gửi email thành công, xin mời kiểm tra email');
        }else{
            return Redirect()
                ->back()
                ->with('danger', 'Email chưa được đăng ký dưới hệ thống. Vui lòng kiểm tra email');
        }
    }

    function resetPassword($token){
        $condition = [
            'token'     => $token,
            'social_id' => 0,
        ];
        $data      = $this->user->resetPassword($condition);
        if ($data){
            $time = abs($data->updated_at->minute - Carbon::now()->minute);
            if ($time <= 2){
                return view('client.pages.ResetPassword', ['email' => $data->email,
                                                           'token' => $data->token]);
            }else{
                $data      = [
                    'token' => strtoupper(Str::random(10)),
                ];
                $condition = [
                    'token' => $token,
                ];
                $this->user->updateUser($data, $condition);

                return Redirect()
                    ->route('error')
                    ->with('error',
                        " Đã quá thời gian đổi mật khẩu là 2 PHÚT. Xin vui lòng cập nhật lại"); //404
            }
        }else{
            return Redirect()->route('error')->with('error',
                "Phiên bản đã hết hạn. Xin vui lòng thử lại "); //404
        }
    }

    function postResetPassword(ResetPasswordRequest $request, $token){


        $condition = [
            'token' => $token,
        ];

        $time = abs($this->user->resetPassword($condition)->updated_at->minute - Carbon::now()->minute);
        if ($time <= 2){
            $data = [
                'password' => Hash::make($request->password),
                'token'    => strtoupper(Str::random(10)),
            ];
            $this->user->updateUser($data, $condition);
                return Redirect()
                    ->route('login')
                    ->with('success', 'Cập nhật lại mật khẩu thành công ');
        }else{

            $data = [
                'token' => strtoupper(Str::random(10)),
            ];

            $this->user->updateUser($data, $condition);

            return Redirect()
                ->route('error')
                ->with('error',
                    " Đã quá thời gian đổi mật khẩu là 2 PHÚT. Xin vui lòng cập nhật lại"); //404
        }


    }
}
