<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DeleteUserController extends Controller{

    public $user;

    public function __construct(){
        $this->user = new User();
    }


    public function deleteUser($id){

        // Tìm tài khoản cần xóa
        $user  = User::findOrFail($id);
        $posts = Post::where('id_user', $id)->get();
        // Xóa các bài viết
//        foreach ($posts as $post){
//            $post->deletePost();
//        }
        // Xóa tài khoản và liên kết trong bảng "media" thông qua phương thức trong Model
        $user->deleteUser();

        // Cập nhật trạng thái đã xoá của tài khoản
        $user->delete = true;
        $user->save();

        return redirect()->back()->with('success', 'Tài khoản đã được xóa thành công.');
    }

    function userRestore($id)
    {
        $user = User::findOrFail($id); // Tìm người dùng dựa trên ID

        $user->delete = 0; // Khôi phục trường deleted_at thành null

        $user->save(); // Lưu thay đổi

        return redirect()->back()->with('success', 'Đã khôi phục tài khoản thành công');
    }

}
