<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    public function listPost($condition)
    {

        return $this->orderBy('id', 'desc')->where($condition)->paginate(5);
    }

    public function Show($condition, $name)
    {
        return DB::table($name)->where($condition)->get();
    } // sửa sau 15 tây

    public function addPost($value)
    {
        return $this->insertGetId($value);
    }

    public function getId($where)
    {
        return $this->select('id')->where($where)->first()->id;
    }

    public function editPost($where)
    {
        return $this->where($where)->first();
    }

    public function updatePost($condition, $value)
    {
        return $this->where($condition)->update($value);
    }
    public function deletePost()
    {
        // Xóa liên kết trong bảng "media"
        $this->media()->delete();

        // Xóa bài viết
        $this->delete();
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'id_post');
    }
}
