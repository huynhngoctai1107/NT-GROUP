<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DeleteUserController extends Controller
{
    public $user;

    public function __construct(){
        $this->user = new User();
    }


    public function deleteUser($id)
    {
        $user = DB::table('users')->find($id);

        if ($user) {
            // Cập nhật cột 'deleted' để đánh dấu người dùng là đã xóa
            DB::table('users')->where('id', $id)->update(['is_deleted' => true]);
        }

        return redirect()->route('listUser')->with('success', 'Xoá tài khoản người dùng thành công');
    }

    public function deletedUserList()
    {
        $deletedUsers = User::onlyTrashed()->get();

        return view('admin.user.deleted_user_list', compact('deletedUsers'));
    }
}
