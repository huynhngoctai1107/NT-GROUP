<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\Account\EditAccountRequest;
use Illuminate\Support\Str;

class EditUserController extends Controller{

    public $user;

    public function __construct(){
        $this->user = new User();
    }

    public function editFormUser($id){
        $condition = [];
        $data      = $this->user->editUser($id);
        $query     = $this->user->show($condition);

        return view('admin.user.add', ['page' => 'editUser', 'data' => $data, 'query' => $query]);
    }

    public function editUser(EditAccountRequest $request, $id){
        // Xử lý tải lên hình ảnh
        if ($request->hasFile('image')){
            $fileName = time() . '-' . 'users' . '.' . $request->image->extension();
            $request->image->move(public_path("images/users"), $fileName);
            $request->merge(['image' => $fileName]);
        }

        // Lấy dữ liệu tài khoản người dùng từ form
        $userData = [
            'id_role'  => $request->id_role,
            'fullname' => $request->fullname,
            'email'    => $request->email,
            'wallet'   => $request->wallet,
            'token'      => strtoupper(Str::random(10)),
            'gender'   => $request->gender,
            'phone'    => $request->phone,
            'address'  => $request->address,
         
        ];

        // Tìm người dùng theo ID
        $user = User::findOrFail($id);

        // Cập nhật thông tin người dùng
        $user->fill($userData);

        // Kiểm tra và cập nhật giới tính nếu có
        if ($request->filled('gender')){
            $user->gender = $request->input('gender');
        }

        // Kiểm tra và cập nhật hình ảnh nếu có
        if ($request->hasFile('image')){
            $user->image = $fileName;
        }

        // Lưu thông tin người dùng
        $user->save();

        // Lưu giới tính và tên hình ảnh của người dùng vào session
        session(['gender' => $user->gender, 'image' => $user->image]);
        if($request->id_role == 1 ){
            return redirect()->route('listUser');
        }else{
            return redirect()->route('dashboar');
        }
    }
}