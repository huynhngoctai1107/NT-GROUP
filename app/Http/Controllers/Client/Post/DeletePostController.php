<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class DeletePostController extends Controller
{
    public $post;

    public function __construct()
    {
        $this->post = new Post();
    }
    function deletePostlist($slug){
        $condition = [
            'slug' => $slug,
        ];
        $value = [
            'delete' => 1,
            'status'=> 0,
        ];
        $this->post->updatePost($condition,$value);
        return redirect()->back()->with('success','Xóa bài viết thành công');
    }
}
