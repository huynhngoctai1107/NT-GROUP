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
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;

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

        $score = RecaptchaV3::verify($request->get('g-recaptcha-response'));
        if ($score > 0.7){
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
                    ->back()->withInput($request->input())
                    ->with('danger',
                        'Email chưa được đăng ký dưới hệ thống. Vui lòng kiểm tra email');
            }
        }else{
            return Redirect()
                ->back()
                ->withInput($request->input())
                ->with('danger',
                    'Có thể bạn là robot');
        }
    }

    function resetPassword($token){
        $condition = [
            'token'     => $token,
            'social_id' => 0,
        ];


        if ($this->user->resetPassword($condition)){
            $time = abs($this->user->resetPassword($condition)->updated_at->minute - Carbon::now()->minute);
            if ($time <= 2){
                return view('client.pages.ResetPassword',
                    ['email' => $this->user->resetPassword($condition)->email,
                     'token' => $this->user->resetPassword($condition)->token]);
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
                    ->with(['error' => "Đã quá thời gian đổi mật khẩu là 2 PHÚT. Tài khoản đã bị khóa xin lòng liên hệ Admin", "title" => 403]); //404

            }
        }else{
            return Redirect()->route('error')
                             ->with(['error' => "Phiên bản đã hết hạn. Xin vui lòng thử lại ", "title" => 404]); //404

        }
    }

    function postResetPassword(ResetPasswordRequest $request, $token){
        $condition = [
            'token' => $token,
        ];
        $score     = RecaptchaV3::verify($request->get('g-recaptcha-response'));
        if ($score > 0.7){

            $time = abs($this->user->resetPassword($condition)->updated_at->minute - Carbon::now()->minute);

            if ($time <= 2 && $time >= 0){

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
                    ->with(['error' => " Đã quá thời gian đổi mật khẩu là 2 PHÚT. Xin vui lòng cập nhật lại", "title" => 403]); //404

            }

        }else{
            return Redirect()
                ->route('error')
                ->with(['error' => "Có thể bạn là Robot. Xin vui lòng thử lại", "title" => 403]); //404


        }


    }
}
