<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\CategoryBlog;
use App\Models\Demand;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Post;

class CreateSiteMap extends Command
{
    /**
     * Tên và chữ ký của command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create';

    /**
     * Mô tả của command.
     *
     * @var string
     */
    protected $description = 'Tạo sitemap cho ứng dụng.';

    /**
     * Thực thi command.
     */
    public function handle()
    {
        // Tạo một instance mới của Sitemap
        $sitemap = Sitemap::create();

        $sitemap->add(URL::to('/'), Carbon::now(), '1.0', 'daily');
        $sitemap->add(route('about'), Carbon::now(), '1.0', 'daily');
        $sitemap->add(route('contact'), Carbon::now(), '1.0', 'daily');
        $sitemap->add(route('buildCost'), Carbon::now(), '1.0', 'daily');
        $sitemap->add(route('designCost'), Carbon::now(), '1.0', 'daily');
        $sitemap->add(route('viewCalculate'), Carbon::now(), '1.0', 'daily');
        $sitemap->add(route('mapLocation'), Carbon::now(), '1.0', 'daily');

        $blogs = Blog::orderBy('created_at', 'desc')->paginate(10000);

        foreach ($blogs as $blog) {
            // Thêm URL của blog vào sitemap
            $sitemap->add(route('SingleBlog', ['slug' => $blog->slug]), $blog->created_at, '0.9', 'daily');
        }

        $posts = Post::orderBy('created_at', 'desc')->get();

        foreach ($posts as $post) {
            // Thêm URL của blog vào sitemap
            $sitemap->add(route('postSingle', ['slug' => $post->slug]), $post->created_at, '0.9', 'daily');
        }

        $Categoryblogs = CategoryBlog::orderBy('created_at', 'desc')->get();

        foreach ($Categoryblogs as $cateblog) {
            // Thêm URL của blog vào sitemap
            $sitemap->add(route('SearchBlogList', ['slug' => $cateblog->slug]), $cateblog->created_at, '0.8', 'daily');
        }

        $Demands = Demand::orderBy('created_at', 'desc')->get();

        foreach ($Demands as $demand) {
            // Thêm URL của blog vào sitemap
            $sitemap->add(route('search1', ['slug' => $demand->slug]), $demand->created_at, '0.8', 'daily');
        }

        $Categories = Category::orderBy('created_at', 'desc')->get();

        foreach ($Categories as $category) {
            // Thêm URL của blog vào sitemap
            $sitemap->add(route('search', ['slug' => $category->slug]), $category->created_at, '0.8', 'daily');
        }

        // Lưu sitemap vào tập tin
        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
