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

    public function distance($condition, $location, $kilometer){
        $latitude  = (float) $location[0];
        $longitude = (float) $location[1];


        return $this->select('*')
                    ->selectRaw(" ( 6371 * acos( cos( radians(?) ) *
                       cos( radians( latitude ) )
                       * cos( radians( longitude ) - radians(?)
                       ) + sin( radians(?) ) *
                       sin( radians( latitude ) ) )
                     ) AS distance", [$latitude, $longitude, $latitude])
                    ->having('distance', '<=', $kilometer)
                    ->where($condition)
                    ->orderBy('distance')
                    ->get();
    }

    function haversineDistance($lat1, $lon1, $lat2, $lon2){
        $lat1Rad = deg2rad($lat1);
        $lon1Rad = deg2rad($lon1);
        $lat2Rad = deg2rad($lat2);
        $lon2Rad = deg2rad($lon2);

        $deltaLat = $lat2Rad - $lat1Rad;
        $deltaLon = $lon2Rad - $lon1Rad;

        $a = sin($deltaLat / 2) * sin($deltaLat / 2) +
             cos($lat1Rad) * cos($lat2Rad) * sin($deltaLon / 2) * sin($deltaLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = 6371 * $c; // Earth's radius in kilometers

        return $distance;
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
        $this->contact()->delete();

        // Xóa bài viết
        $this->delete();
    }

    public function media(){
        return $this->hasMany(Media::class, 'id_post');
    }

    public function contact(){
        return $this->hasMany(Contact::class, 'id_post');
    }


    public function getPostList($condition, $orderBy, $random, $perPage = NULL){
        $query = $this->where($condition)
                      ->select('posts.id as id_post', 'posts.slug as slug_posts',
                          'category_posts.name as name_category',
                          'category_posts.slug as slug_category', 'demands.name as name_demands',
                          'demands.slug as slug_demands', 'title', 'posts.address',
                          'expiration_date',
                          'acreages', 'number_views', 'price', 'subtitles', 'posts.created_at',
                          DB::raw('GROUP_CONCAT(medias.image) AS images'))
                      ->join('medias', 'medias.id_post', '=', 'posts.id')
                      ->join('demands', 'demands.id', '=', 'posts.id_demand')
                      ->join('category_posts', 'category_posts.id', '=', 'posts.id_category')
                      ->groupBy('id_post');

        if ($orderBy !== NULL){
            $query->orderBy($orderBy);
        }

        if ($random){
            $query->inRandomOrder();
        }
        if (isset($perPage)){
            return $query->paginate($perPage);
        }else{
            return $query->get();
        }
    }

    public function getPost($condition){
        return $this->where($condition)
                    ->select('posts.id as id_post', 'posts.slug as slug_posts',
                        'category_posts.name as name_category', 'demands.id as id_demands',
                        'category_posts.slug as slug_category', 'demands.name as name_demands',
                        'demands.slug as slug_demands', 'users.email',
                        'posts.delete as delete_posts', 'posts.title', 'posts.subtitles',
                        'price', 'acreages', 'content', 'posts.status as status_post',
                        'posts.featured_news',
                        'posts.link_youtube', 'posts.address',
                        DB::raw('GROUP_CONCAT(medias.image) AS images'))
                    ->join('medias', 'medias.id_post', '=', 'posts.id')
                    ->join('demands', 'demands.id', '=', 'posts.id_demand')
                    ->join('category_posts', 'category_posts.id', '=', 'posts.id_category')
                    ->join('users', 'users.id', '=', 'posts.id_user')
                    ->groupby('id_post')
                    ->get();
    }

    public function getPostFollow($values,$perPage){
        return $this->select('posts.id as id_post', 'posts.slug as slug_posts',
            'category_posts.name as name_category', 'demands.id as id_demands',
            'category_posts.slug as slug_category', 'demands.name as name_demands',
            'demands.slug as slug_demands', 'users.email','fullname','users.slug as slug_user',
            'posts.delete as delete_posts', 'posts.title', 'posts.subtitles',
            'price', 'acreages', 'content', 'posts.status as status_post',
            'posts.featured_news',
            'posts.link_youtube', 'posts.address',
            DB::raw('GROUP_CONCAT(medias.image) AS images'))
                    ->join('medias', 'medias.id_post', 'posts.id')
                    ->join('demands', 'demands.id', 'posts.id_demand')
                    ->join('category_posts', 'category_posts.id', 'posts.id_category')
                    ->join('users', 'users.id', 'posts.id_user')
                      ->orderBy('posts.id', 'desc')
                    ->whereIn('posts.id_user',$values)
                    ->groupby('id_post')->paginate($perPage);

    }

    public function firstPost($condition){
        return $this->where($condition)
                    ->select('posts.id as id_post', 'posts.slug as slug_posts',
                        'category_posts.name as name_category', 'demands.id as id_demands',
                        'category_posts.slug as slug_category', 'demands.name as name_demands',
                        'demands.slug as slug_demands', 'users.email',
                        'posts.delete as delete_posts', 'posts.title', 'posts.subtitles',
                        'price', 'acreages', 'content', 'posts.id_user',
                        'posts.status as status_post', 'posts.featured_news',
                        'posts.link_youtube', 'posts.address',
                        DB::raw('GROUP_CONCAT(medias.image) AS images'))
                    ->join('medias', 'medias.id_post', '=', 'posts.id')
                    ->join('demands', 'demands.id', '=', 'posts.id_demand')
                    ->join('category_posts', 'category_posts.id', '=', 'posts.id_category')
                    ->join('users', 'users.id', '=', 'posts.id_user')
                    ->groupby('id_post')
                    ->first();
    }


    public function getPostWithContacts($condition){
        $post = $this->select(
            'posts.id as id_post',
            'posts.slug as slug_posts',
            'category_posts.name as name_category',
            'category_posts.slug as slug_category',
            'demands.name as name_demand',
            'demands.slug as slug_demand',
            'users.fullname as fullname',
            'users.email as email',
            'users.image  as user_image',
            'users.phone  as user_phone',
            'posts.id_user',
            'posts.featured_news',
            'posts.delete as delete_posts',
            'demands.id as id_demand',
            'title',
            'users.slug',
            'content',
            'acreages',
            'posts.address as posts_address',
            'number_views',
            'posts.price as price_posts',
            'subtitles',
            'posts.created_at as posts_at',
            'longitude',
            'latitude', DB::raw('GROUP_CONCAT(medias.image) AS images'))
                     ->join('medias', 'medias.id_post', '=', 'posts.id')
                     ->join('demands', 'demands.id', '=', 'posts.id_demand')
                     ->join('category_posts', 'category_posts.id', '=', 'posts.id_category')
                     ->join('users', 'users.id', '=', 'posts.id_user')
                     ->where($condition)
                     ->groupBy('id_post')
                     ->first();

        if ($post){
            $contacts       = Contact::where('id_post', $post->id_post)->get();
            $post->contacts = $contacts;
        }

        return $post;
    }

    public function getPostCD($condition, $slug, $name){
        return $this->where($condition)
                    ->whereHas($name, function ($query) use ($slug){
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

    public function demand(){
        return $this->belongsTo(Demand::class, 'id_demand');
    }

    public function categoriesWithPostCount(){
        $categoriesWithPostCount = DB::table('category_posts')
                                     ->select('category_posts.*',
                                         DB::raw('count(posts.id) as post_count'))
                                     ->leftJoin('posts', 'category_posts.id', '=',
                                         'posts.id_category')
                                     ->groupBy('category_posts.id', 'category_posts.name',
                                         'category_posts.slug')
                                     ->get();

        return $categoriesWithPostCount;
    }
}
