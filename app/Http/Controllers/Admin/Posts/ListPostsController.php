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
        return view('Admin.PostsCategory.List', ['page' => 'posts', 'query' => $data]);
    }
    function searchListPost(Request $request){
        $condition = [
            ['delete', '=', 0],
        ];
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $condition[] = ['title', 'LIKE', "%$keyword%"];
        }
        $data = $this->posts->listPost($condition);
        if ($data->isEmpty()) {
            return view('Admin.PostsCategory.List', ['page' => 'posts', 'query' => $data])
                ->with('message', 'Không tìm thấy kết quả.');
        } else {
            return view('Admin.PostsCategory.List', ['page' => 'posts', 'query' => $data]);
        }
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
        return view('Admin.PostsCategory.DeleteHistory', ['page' => 'posts', 'query' => $data]);
    }

    function searchHisPost(Request $request)
    {
        $condition = [
            ['delete', '=', 1],
        ];
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $condition[] = ['title', 'LIKE', "%$keyword%"];
        }
        $data = $this->posts->listPost($condition);
        if ($data->isEmpty()) {
            return view('Admin.PostsCategory.DeleteHistory', ['page' => 'posts', 'query' => $data])
                ->with('message', 'Không tìm thấy kết quả.');
        } else {
            return view('Admin.PostsCategory.DeleteHistory', ['page' => 'posts', 'query' => $data]);
        }
    }
}
