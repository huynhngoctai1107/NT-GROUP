<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListPostsController extends Controller
{
    public $posts;
    public function __construct()
    {
        $this->posts = new Post();
    }
    function listPosts()
    {
        $condition = [
            ['delete', '=', 0],
        ];
        $data = $this->posts->listPost($condition);
        return view('admin.postscategory.list', ['page' => 'posts', 'query' => $data]);
    }
    public function UpdateStatus($postId)
    {
        $post = Post::find($postId);

        if ($post) {
            if ($post->status) {
                $post->status = 0;
            } else {
                $post->status = 1;
            }
            $post->save();
        }
        return back();
    }

    function listHistory()
    {
        $condition = [
            ['delete', '=', 1],
        ];
        $data = $this->posts->listPost($condition);
        return view('admin.postscategory.DeleteHistory', ['page' => 'posts', 'query' => $data]);
    }
}
