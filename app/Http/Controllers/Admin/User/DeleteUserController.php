<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteUserController extends Controller
{
    public function deleteUser($id)
    {
        // Kiểm tra xem người dùng có tồn tại trong cơ sở dữ liệu hay không
        $user = DB::table('users')->find($id);

        if ($user) {
            // Xóa tài khoản người dùng khỏi cơ sở dữ liệu
            DB::table('users')->where('id', $id)->delete();
        }

        return redirect()->route('listUser');
    }
}
