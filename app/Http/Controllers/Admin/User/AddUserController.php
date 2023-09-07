<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddUserController extends Controller
{
    function addFormUser(){
        return view('admin.user.add',['page'=>'addUser']);
    }
    function addUser(){
        return redirect()->back()->with('success','Đã thêm danh mucj cầu thành công');
     }
}
