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

        // Tìm bài viết cần xóa
        $user = User::findOrFail($id);
        $posts = Post::where('id_user', $id)->get();
        // Xóa các bài viết
        foreach ($posts as $post) {
            $post->deletePost();
        }

        // Xóa bài viết và liên kết trong bảng "media" thông qua phương thức trong Model
        $user->deleteUser();

        return redirect()->back()->with('success', 'Tài khoản đã được xóa thành công.');
    }

    public function userHistory()
    {
        // Lấy tất cả các tài khoản đã bị xóa từ bảng DeletedUser
        $userHistory = userHistory::all();

        // Truyền dữ liệu tài khoản đã xóa vào view để hiển thị
        return view('userHistory', compact('userHistory'));
    }

}
