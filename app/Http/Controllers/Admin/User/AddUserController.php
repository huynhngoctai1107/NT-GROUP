<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Account\AddAccountRequest;
use Illuminate\Support\Str;

class AddUserController extends Controller{

    public $user;

    public function __construct(){
        $this->user = new User();
    }

    public function addFormUser(){
        $condition = [];
        $data      = $this->user->show($condition);

        return view('Admin.User.Add', ['page' => 'addUser', 'query' => $data]);
    }

    public function formAddUser(AddAccountRequest $request){
        // Xử lý tải lên hình ảnh
        $fileName = NULL;
        if ($request->hasFile('image')){
            $fileName = time() . '-' . 'users' . '.' . $request->image->extension();
            $request->image->move(public_path("images"), $fileName);
        }

        // Tạo mới tài khoản người dùng
        $userData = [
            'id_role'  => $request->id_role,
            'fullname' => $request->fullname,
            'slug'     => Str::slug($request->fullname),
            'email'    => $request->email,
            'wallet'   => $request->wallet,
            'gender'   => $request->gender,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'password' => Hash::make($request->password),
            'image'    => $fileName,
        ];

        User::insert($userData);

        return redirect()
            ->route('listUser')
            ->with('success',
                'Thêm tài khoản người dùng " ' . $request->fullname . ' " thành công');
    }
}