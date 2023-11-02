<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostListController extends Controller
{
    public $post;
    public $category;
    public function __construct()
    {
        $this->post = new Post();
        $this->category = new Category();
    }
    function listPost(Request $request){
        $condition = [
            ['delete', '=', 0],
            ['status', '=', 1],
        ];
        $condition1 = [
            ['delete', '=', 0],
            ['status', '=', 1],
        ];
        $data = $this->post->getPostList($condition, null, false);
        $lq = $this->post->getPostList($condition1, null, true)->take(3);
        $category = $this->category->GetCategory();
        return view('Client.Pages.ListPostAll',['page'=>'post', 'list'=>$data, 'category'=>$category, 'lq'=>$lq]);
    }
}
