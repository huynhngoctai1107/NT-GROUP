<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
}
