<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostNewController extends Controller
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

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $condition[] = ['title', 'LIKE', "%$keyword%"];
        }

        if ($request->filled('category')) {
            $category = $request->category;
            if ($category != 0){
                $condition[] = ['id_category', '=', $category];
            }
        }
        $data = $this->post->getPostList($condition);
        $lq = $this->post->getPostList($condition1)->take(3);
        $category = $this->category->GetCategory();
        return view('Client.Pages.ListPostAll',['page'=>'post', 'list'=>$data, 'category'=>$category, 'lq'=>$lq]);
    }
}
