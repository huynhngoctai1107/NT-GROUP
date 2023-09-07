<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditUserController extends Controller
{
  
    function editFormUser(){
            

        return view('admin.user.add',['page'=>'editUser']); 
    }
    function editUser(){
       return redirect()->route('listUser')->with('success','Đã sửa danh mục thành công');
    }
}
