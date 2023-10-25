<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class DeletePostController extends Controller
{
    public $Post;

    public function __construct()
    {
        $this->post = new Post();
    }
    function deletePostlist($id){
        $condition = [
            'id' => $id,
        ];
        $value = [
            'delete' => 1,
        ];
        $this->post->updatePost($condition,$value);
        return redirect()->back()->with('Xóa bài viết thành công');
    }
}
