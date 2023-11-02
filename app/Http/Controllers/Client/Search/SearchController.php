<?php

namespace App\Http\Controllers\Client\Search;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public $post;
    public $category;
    public function __construct()
    {
        $this->post = new Post();
        $this->category = new Category();
    }
    function search($slug){
        $condition = [
            ['delete', '=', 0],
            ['status', '=', 1],
        ];
        $data = $this->post->getPostCD($condition,$slug,'category');
        $sale = $this->post->getPostList($condition, null, true)->take(3);
        return view('Client.Pages.search',['page'=>'search', 'list'=>$data, 'sale'=>$sale]);

    }
    function search1($slug){
        $condition = [
            ['delete', '=', 0],
            ['status', '=', 1],
        ];
        $data = $this->post->getPostCD($condition,$slug,'demand');
        $sale = $this->post->getPostList($condition)->take(3);
        return view('Client.Pages.search',['page'=>'search', 'list'=>$data, 'sale'=>$sale]);

    }
}
