<?php

namespace App\Http\Controllers\Client\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ActiveController extends Controller{

    public function activateMaill($data){
        if ($data){
            Mail::send('Client.Mail.MailActive', compact('data'), function ($email) use ($data){
                $email->subject('NT-GROUP - Kích hoạt tài khoản');
                $email->to($data->email, $data->name);
            });
        }
    }
}
