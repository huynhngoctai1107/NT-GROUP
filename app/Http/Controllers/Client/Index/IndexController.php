<?php

namespace App\Http\Controllers\Client\Index;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Email;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
            ['posts.delete', '=', 0],
            ['posts.status', '=', 1],
        ];
        $data = $this->post->getPostList($condition, null, true)->take(3);
        $h = $this->post->getPostList($condition, null, false);
        $hot = $h->sortByDesc('number_views')->take(8);

        $today = Carbon::now();
        $condition1 = [
            ['posts.delete', '=', 0],
            ['status', '=', 1],
            ['featured_news', '=', 1],
        ];
        $vip = $this->post->getPostList($condition1, null, false);

        $datas = [];

        foreach ($vip as $post) {
            // Kiểm tra kiểu dữ liệu của $post
            if ($post instanceof Post) {
                $expirationDate = Carbon::parse($post->expiration_date);

                if ($expirationDate > $today) {
                    // Thêm dữ liệu bài viết vào mảng $data
                    $datas[] = $post;
                } else {
                    // Cập nhật featured_news = 0
                    DB::table('posts')
                      ->where('id', $post->id_post)
                      ->update(['featured_news' => 0, 'expiration_date'=>null]);
                }
            }
        }

        $category = $this->category->GetCategory();

        return view('Client.Pages.Index', ['data' => $data, 'category' => $category, 'vip' => $datas, 'hot' => $hot]);
    }
}
