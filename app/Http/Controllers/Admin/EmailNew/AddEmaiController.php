<?php

namespace App\Http\Controllers\Admin\EmailNew;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Account\EmailRequest;
use App\Models\Email;

class AddEmaiController extends Controller
{
    public $email;

    public function __construct(){
        $this->email = new Email();
    }

    public function emailFrom(EmailRequest $request){
        $data = [
            'email'      => $request->email,
            'interaction_count' => 0,
        ];
        $this->email->addEmail($data);
        return redirect()->back()->with('success', 'Đã gửi email thành công');
    }
}
