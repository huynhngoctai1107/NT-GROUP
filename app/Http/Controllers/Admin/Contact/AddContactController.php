<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\ContactsRequest;
use App\Http\Controllers\Client\Mail\ContactController;
use App\Models\Contact;

class AddContactController extends Controller{

    public $contact;
    public $mail;

    public function __construct(){
        $this->contact = new Contact();
        $this->mail = new ContactController();
    }
    function contact(){
        return view('Client.Pages.contact', ['page' => 'contact']);
    }
    function contactFrom(ContactsRequest $request){
        $data = [
            'fullname'   => $request->fullname,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'content'    => $request->content,
        ];
    if($this->contact->addContact($data)){

        $this->mail->contactMail($data);
        return Redirect()
            ->back()
            ->with('success', 'Gửi yêu cầu thành công, vui lòng đợi trong giây lát chúng tôi sẽ liện hệ bạn!');

    }else{

        return Redirect()
            ->back()
            ->with('error', 'Gửi yêu cầu thất bại. Vui lòng kiểm tra lại!');
         }
    }

}
