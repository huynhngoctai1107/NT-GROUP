<?php

namespace App\Http\Controllers\Admin\EmailNew;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Email;

class ListEmailController extends Controller
{
    public $email;

    public function __construct(){
        $this->email = new Email();
    }

    function listEmail(){
        $condition = [
            'delete' => 0,
        ];
        $query = $this->email->listEmail($condition);
        return view('Admin.EmailNew.ListEmail', compact('query'));
    }
    function listDeleteEmail()
    {
        $condition = [
            'delete' => 1,
        ]; //
        $data = $this->email->listEmail($condition);
        return view('admin.emailnew.DeleteEmail', ['page' => 'faqs', 'query' => $data]);
    }
    function restoreEmail($id){
        $condition = [
            ['id', '=', $id],
        ];
        $value = [
            'delete' => 0,
        ];
        $this->email->updateEmail($condition, $value);
        return redirect()->back()->with('success', 'Đã khôi phục email thành công');
    }
}
