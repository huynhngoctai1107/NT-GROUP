<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table = 'medias';

    public function addMedia($data)
    {
        return $this->insert($data);
    }

    public function showMedia($whereMedia)
    {
        return $this->where($whereMedia)->get();
    }
    public function deleteMedia($condition)
    {
        return $this->where($condition)->delete();
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'id_post');
    }
}
