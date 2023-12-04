<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\CategoryBlog;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';

    public function listBlog($condition){

        return $this->orderBy('id', 'desc')->where($condition)->paginate(9);
    }

    public function listBlogAdmin($condition){

        return $this->orderBy('id', 'desc')->where($condition)->paginate(5);
    }

    public function searchBlog($condition)
    {
        return $this->where($condition)->orderBy('id', 'desc')->paginate(5);
    }

    public function addBlog($value)
    {
        return $this->insert($value);
    }

    public function editBlog($condition)
    {
        return $this->where($condition)->first();
    }

    public function updateBlog($value, $condition)
    {

        return $this->where($condition)->update($value);
    }
    public function deleteBlog($condition)
    {
        return $this->where($condition)->delete();
    }

    public function SingleBlog($condition){
        return $this->where($condition)->first();
    }

    // Trong mô hình Blog
    public function categoryBlog() {
        return $this->belongsTo(CategoryBlog::class, 'id_category_blog');
    }


    public function getBlogCD($condition, $slug, $relationName) {
        return $this->where($condition)
                    ->whereHas('categoryBlog', function ($query) use ($slug) {
                        $query->where('slug', $slug);
                    })
                    ->select('blogs.id as id_blog', 'blogs.slug as slug_blogs',
                        'category_blogs.name as name_category',
                        'category_blogs.slug as slug_category', 'title', 'image',
                        'content', 'excerpt', 'blogs.created_at')
                    ->from('blogs')
                    ->join('category_blogs', 'category_blogs.id', '=', 'blogs.id_category_blog')
                    ->groupBy('id_blog')
                    ->paginate(9);
    }

}
