<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;


class ListContactController extends Controller
{
    public $Contact;

    public function __construct()
    {
        $this->contact = new Contact();
    }
    function listContact(){
        $condition = []; // Thêm các điều kiện của bạn ở đây nếu cần
        $query =$this->contact->listContact($condition);
        return view('Admin.Contact.ListContact', compact('query'));
    }

}
