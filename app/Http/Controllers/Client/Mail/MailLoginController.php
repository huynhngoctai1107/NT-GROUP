<?php

namespace App\Http\Controllers\Client\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Agent\Agent;

class MailLoginController extends Controller{

    public function loginMail(){

            $agent = new Agent();
            $data= [
                'browser'  => $agent->browser(),
                'version'  => $agent->version($agent->browser()),
                'platform' => $agent->platform(),
                'time'     => date('Y-m-d H:i:s'),
                'device'   => $agent->version($agent->platform()),
                'language' =>$agent->languages(),
                'fullname' =>auth()->user()->fullname,
                'email'   =>auth()->user()->email,
            ];
            Mail::send('client.mail.MailLogin', compact('data'), function ($email) use ($data){
                $email->subject('NT-GROUP - Thông báo đăng nhập');
                $email->to($data['email'], $data['fullname']);
            });

    }
}
