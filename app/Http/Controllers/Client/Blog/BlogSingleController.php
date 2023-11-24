<?php

namespace App\Http\Controllers\Client\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogSingleController extends Controller
{
    public $blog;
    public $post;
    public function __construct()
    {
        $this->blog = new Blog();
        $this->post = new Post();
    }
    function SingleBlog($slug)
    {
        $condition        = ['slug' => $slug,];
        $data = $this->blog->SingleBlog($condition);
        $condition1 = [
            ['delete', '=', 0],
            ['status', '=', 1],
        ];
        $list = $this->post->getPostList($condition1, null, TRUE)->take(5);
        return view('Client.Pages.BlogSingle', ['data' => $data, 'list'=>$list]);
    }

}
