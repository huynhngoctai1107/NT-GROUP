<?php

namespace App\Http\Controllers\Client\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller{

    public function forgetPassword($data){
        if ($data){
            Mail::send('client.mail.MailForgetPassword', compact('data'),
                function ($email) use ($data){
                    $email->subject('NT-GROUP - Lấy lại mật khẩu');
                    $email->to($data->email, $data->name);
                });
        }
    }
}
