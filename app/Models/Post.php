<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Post extends Model{

    use HasFactory;

    protected $table = 'posts';

    public function listPost($condition){
        return $this->orderBy('id', 'desc')->where($condition)->paginate(5);
    }

    public function Show($condition, $name){
        return DB::table($name)->where($condition)->get();
    } // sửa sau 15 tây

    public function addPost($value){
        return $this->insertGetId($value);
    }

    public function getId($where){
        return $this->select('id')->where($where)->first()->id;
    }

    public function editPost($where){
        return $this->where($where)->first();
    }

    public function updatePost($condition, $value){
        return $this->where($condition)->update($value);
    }

    public function deletePost(){
        // Xóa liên kết trong bảng "media"
        $this->media()->delete();

        // Xóa bài viết
        $this->delete();
    }

    public function media(){
        return $this->hasMany(Media::class, 'id_post');
    }

    public function postlist($condition){
        return $this->where($condition)->get();
    }

    public function getPost($condition){
        return $this->where($condition)
                    ->select('posts.id as id_post', 'category_posts.name as name_category',
                        'category_posts.slug as slug_category', 'demands.name as name_demands',
                        'demands.slug as slug_demands', 'users.email', 'title', 'subtitles',
                        'price', 'acreages', 'content',
                        'link_youtube', 'posts.address',
                        DB::raw('GROUP_CONCAT(medias.image) AS images'))
                    ->join('medias', 'medias.id_post', '=', 'posts.id')
                    ->join('demands', 'demands.id', '=', 'posts.id_demand')
                    ->join('category_posts', 'category_posts.id', '=', 'posts.id_category')
                    ->join('users', 'users.id', '=', 'posts.id_user')
                    ->groupby('id_post')
                    ->get();
    }

    //    public function getPost($condition){
    //        return $this->where($condition)
    //                    ->select('posts.id as id_post','posts.slug as slug_posts','category_posts.name as name_category',
    //                        'category_posts.slug as slug_category', 'demands.name as name_demands',
    //                        'demands.slug as slug_demands','title', 'address', 'acreages', 'number_views', 'price','subtitles', 'posts.created_at',
    //                        DB::raw('GROUP_CONCAT(medias.image) AS images'))
    //                    ->join('medias', 'medias.id_post', '=', 'posts.id')
    //                    ->join('demands', 'demands.id', '=', 'posts.id_demand')
    //                    ->join('category_posts', 'category_posts.id', '=', 'posts.id_category')
    //                    ->groupby('id_post')
    //                    ->get();
    //    }
    // hòa sửa
    public function getFirstPost($condition){
        return $this->select('posts.id as id_post', 'posts.slug as slug_posts',
            'category_posts.name as name_category',
            'category_posts.slug as slug_category', 'demands.name as name_demand',
            'demands.slug as slug_demand', 'title',
            'content', 'acreages', 'address', 'posts.price as price_posts', 'subtitles',
            'posts.created_at as posts_at',
            'longitude', 'latitude',
            DB::raw('GROUP_CONCAT(medias.image) AS images'))
                    ->join('medias', 'medias.id_post', '=', 'posts.id')
                    ->join('demands', 'demands.id', '=', 'posts.id_demand')
                    ->join('category_posts', 'category_posts.id', '=', 'posts.id_category')
                    ->where($condition)
                    ->groupBy('id_post')
                    ->first();
    }

    public function getPostCategory($condition, $slug){
        return $this->where($condition)
                    ->whereHas('category', function ($query) use ($slug){
                        $query->where('slug', '=', $slug);
                    })
                    ->select('posts.id as id_post', 'posts.slug as slug_posts',
                        'category_posts.name as name_category',
                        'category_posts.slug as slug_category', 'demands.name as name_demands',
                        'demands.slug as slug_demands', 'title', 'address', 'acreages', 'price',
                        'subtitles', 'posts.created_at',
                        DB::raw('GROUP_CONCAT(medias.image) AS images'))
                    ->join('medias', 'medias.id_post', '=', 'posts.id')
                    ->join('demands', 'demands.id', '=', 'posts.id_demand')
                    ->join('category_posts', 'category_posts.id', '=', 'posts.id_category')
                    ->groupBy('id_post')
                    ->get();
    }

    public function category(){
        return $this->belongsTo(Category::class, 'id_category');
    }

//    public function getPostDeamnd($condition, $slug){
//        return $this->where($condition)
//                    ->whereHas('demand', function ($query) use ($slug){
//                        $query->where('slug', '=', $slug);
//                    })
//                    ->select('posts.id as id_post', 'posts.slug as slug_posts',
//                        'category_posts.name as name_category',
//                        'category_posts.slug as slug_category', 'demands.name as name_demands',
//                        'demands.slug as slug_demands', 'title', 'address', 'acreages', 'price',
//                        'subtitles', 'posts.created_at',
//                        DB::raw('GROUP_CONCAT(medias.image) AS images'))
//                    ->join('medias', 'medias.id_post', '=', 'posts.id')
//                    ->join('demands', 'demands.id', '=', 'posts.id_demand')
//                    ->join('category_posts', 'category_posts.id', '=', 'posts.id_category')
//                    ->groupBy('id_post')
//                    ->get();
//    }

    public function demand(){
        return $this->belongsTo(Demand::class, 'id_demand');
    }
}