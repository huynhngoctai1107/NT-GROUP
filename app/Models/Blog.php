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

    public function SingleBlog($condition){
        return $this->where($condition)->first();
    }
}
