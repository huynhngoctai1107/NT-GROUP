<?php

namespace App\Http\Controllers\Client\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogListController extends Controller
{
    public $blog;
    public $post;
    public function __construct()
    {
        $this->blog = new Blog();
        $this->post = new Post();
    }
    function listBlog()
    {
        $condition = [
            ['delete', '=', 0],
        ];
        $data = $this->blog->listBlog($condition);
        $condition1 = [
            ['posts.delete', '=', 0],
            ['status', '=', 1],
        ];
        $list = $this->post->getPostList($condition1, null, TRUE)->take(5);
        return view('Client.Pages.BlogList', ['data' => $data, 'list'=>$list]);
    }

    function SearchBlog(Request $request)
    {
        $condition = [];
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;

        if ($keyword !== null) {
            if (!$request->keyword) {
                return redirect()->back();
            }
            $keyword = $request->keyword;
            $keyword = preg_replace('/\s+/', ' ', $keyword);
            $keyword = trim($keyword);
            $condition[] = ['title', 'LIKE', "%$keyword%"];
        }

        $data = $this->blog->listBlog($condition);
        $condition1 = [
            ['posts.delete', '=', 0],
            ['status', '=', 1],
        ];
        $list = $this->post->getPostList($condition1, null, true)->take(5);

        if ($data->isEmpty()) {
            $message = 'Không tìm thấy kết quả.';
            return view('Client.Pages.BlogList', compact('data', 'list', 'message'));
        } else {
            return view('Client.Pages.BlogList', compact('data', 'list'));
        }
    }

    public function SearchBlogList($id){
        $condition = [
            ['id_category_blog', '=', 0],
        ];
        $data = $this->post->getPostCD($condition,$slug,'demand');
        $sale = $this->post->getPostList($condition, null, true)->take(3);
        return view('Client.Pages.search',['page'=>'search', 'list'=>$data, 'sale'=>$sale]);
    }

}
