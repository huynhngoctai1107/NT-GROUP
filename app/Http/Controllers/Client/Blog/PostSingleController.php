<?php

namespace App\Http\Controllers\Client\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

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
        $postId = $post->id;
        if (auth()->check()) {
            // Đã đăng nhập
            $userId = auth()->user()->id;
        } else {
            // Chưa đăng nhập, tạo một định danh duy nhất cho người dùng vô danh (anonymous user)
            $userId = request()->ip(); // Sử dụng địa chỉ IP làm định danh tạm thời
        }
        $cacheKey = "posts_view:$postId:user:$userId";
        $viewedAt = Cache::get($cacheKey);
        if (!$viewedAt || now()->diffInMinutes($viewedAt) >= 5) {
            // Tăng lượt xem và cập nhật Cache
            $post->increment('number_views');
            Cache::put($cacheKey, now(), now()->addMinutes(5));
        }


        $condition = [
            'posts.slug' => $slug,
        ];

        $data = $this->post->getPostWithContacts($condition);
        $condition1 = [
            ['delete', '=', 0],
            ['status', '=', 1],
        ];
        $count = $this->post->categoriesWithPostCount();
        $list = $this->post->getPostList($condition1, null, false)->take(3);
        return view('Client.Pages.PostSingle',['page'=>'blog', 'data'=>$data, 'category'=>$count, 'list'=>$list, 'count'=>$count]);
    }
}
