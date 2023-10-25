<?php

namespace App\Http\Controllers\Client\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogListController extends Controller
{
    public $post;
    public $category;
    public function __construct()
    {
        $this->post = new Post();
        $this->category = new Category();
    }
    function listBlog(){
        $condition = [
            ['delete', '=', 0],
        ];
        $data = $this->post->getPostList($condition);
        $category = $this->category->GetCategory();
        return view('Client.Pages.BlogList',['page'=>'blog', 'list'=>$data, 'category'=>$category]);

    }
}
