<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faqs;



class ListContactController extends Controller{

    public $faqs;
    public function __construct(){
        $this->faqs = new Faqs();
    }

    function listContact(){
        $condition = [
            'delete' => 0,
        ];
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
    function listDeleteContact()
    {
        $condition = [
            'delete' => 1,
        ]; //
        $data = $this->faqs->listContact($condition);
        return view('admin.contact.DeleteContact', ['page' => 'faqs', 'query' => $data]);
    }

    public function SearchContact(Request $request){

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $condition[] = ['email', 'LIKE', "%$keyword%"];
        }
        $data = $this->faqs->listContact($condition);
        if ($data->isEmpty($condition)) {
            return view('admin.contact.listcontact', ['query' => $data])
                ->with('message', 'Không tìm thấy kết quả.');
        } else {
            return view('admin.contact.listcontact', ['query' => $data])
                ->with('success', 'Danh sách kết quả tìm kiếm.');
        }
    }
}

