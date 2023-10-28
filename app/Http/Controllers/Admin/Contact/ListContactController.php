<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Faqs;


class ListContactController extends Controller{

    public $faqs;

    public function __construct(){
        $this->faqs = new Faqs();
    }

    function listContact(){
        $condition = []; // Thêm các điều kiện của bạn ở đây nếu cần
        $query     = $this->faqs->listContact($condition);

        return view('Admin.Contact.ListContact', compact('query'));
    }

    public function statusContact($id){
        $condition = [
            'id' => $id
        ];
        $query = $this->faqs->firstContact($condition);
        if ($query->status == 0){
            $value= [
                'status' => 1
            ];
        }else{
            $value= [
                'status' => 0
            ];
        }
        $this->faqs->updateContact($condition,$value);
        return back();
    }
}
