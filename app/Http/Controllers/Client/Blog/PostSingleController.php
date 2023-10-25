<?php

namespace App\Http\Controllers\Client\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostSingleController extends Controller
{
    public $post;
    public $category;
    public function __construct()
    {
        $this->post = new Post();
        $this->category = new Category();
    }
    function postSingle($slug){
        $post = Post::where('slug', $slug)->firstOrFail();
        // Tăng số lượt xem lên 1
        $post->number_views++;
        $post->save();
        //
        $condition = [
            'posts.slug' => $slug,
        ];

        $data = $this->post->getFirstPost($condition);
        $category = $this->category->GetCategory();
        $condition1 = [
            ['delete', '=', 0],
            ['status', '=', 1],
        ];
        $list = $this->post->getPostList($condition1)->take(3);
        return view('Client.Pages.PostSingle',['page'=>'blog', 'data'=>$data, 'category'=>$category, 'list'=>$list]);
    }
}
