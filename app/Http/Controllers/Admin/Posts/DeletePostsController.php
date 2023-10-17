<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DeletePostsController extends Controller
{

    public $posts;

    public function __construct()
    {
        $this->posts = new Post();
    }

    function deletePosts($id)
    {

        // Tìm bài viết cần xóa
        $post = Post::findOrFail($id);

        // Xóa bài viết và liên kết trong bảng "media" thông qua phương thức trong Model
        $post->deletePost();

        return redirect()->back()->with('success', 'Bài viết đã được xóa thành công.');
    }

    function deleteHistory($slug)
    {
        $condition = [
            ['slug', '=', $slug],
        ];
        $value = [
            'delete' => 1,
            'status' => 0,
        ];
        $data = $this->posts->updatePost($condition, $value);
        return redirect()->back()->with('success', 'Đã xóa vài viết thành công');
    }
    function restorePost($slug)
    {
        $condition = [
            ['slug', '=', $slug],
        ];
        $value = [
            'delete' => 0,
        ];
        $data = $this->posts->updatePost($condition, $value);
        return redirect()->back()->with('success', 'Đã khôi phục bài viết thành công');
    }
}
