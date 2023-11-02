<?php

namespace App\Http\Controllers\Client\Index;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str ;
class IndexController extends Controller
{
    public $post;
    public $category;
    public function __construct()
    {
        $this->post = new Post();
        $this->category = new Category();
    }
    public function index()
    {
        $condition = [
            ['delete', '=', 0],
            ['status', '=', 1],
        ];
        $data = $this->post->getPostList($condition, null, true)->take(3);
        $h = $this->post->getPostList($condition, null, false);
        $hot = $h->sortByDesc('number_views')->take(8);
        $condition1 = [
            ['delete', '=', 0],
            ['status', '=', 1],
            ['featured_news', '=', 1],
        ];
        $vip = $this->post->getPostList($condition1, null, false)->take(8);
        $category = $this->category->GetCategory();

        return view('client.pages.index', ['data' => $data, 'category' => $category, 'vip' => $vip, 'hot' => $hot]);
    }
}
