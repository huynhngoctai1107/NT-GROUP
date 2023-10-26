<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ContactClient;


class ListContactController extends Controller{

    public $Contact;

    public function __construct(){
        $this->contact = new ContactClient();
    }

    function listContact(){
        $condition = []; // Thêm các điều kiện của bạn ở đây nếu cần
        $query     = $this->contact->listContact($condition);

        return view('Admin.Contact.ListContact', compact('query'));
    }

    public function statusContact($id){
        $condition = [
            'id' => $id
        ];
        $query = $this->contact->firstContact($condition);
        if ($query->status == 0){
            $value= [
                'status' => 1
            ];
        }else{
            $value= [
                'status' => 0
            ];
        }
        $this->contact->updateContact($condition,$value);
        return back();
    }
}
