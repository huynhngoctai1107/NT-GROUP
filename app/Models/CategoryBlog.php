<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBlog extends Model
{
    use HasFactory;
    protected $table = 'category_blogs';

    public function listCategoryBlog()
    {
        return $this->orderBy('id', 'desc')->paginate(5);
    }

    public function searchCategoryBlog($condition)
    {
        return $this->where($condition)->orderBy('id', 'desc')->paginate(5);
    }

    public function addCategoryBlog($value)
    {
        return $this->insert($value);
    }

    public function editCategoryBlog($condition)
    {
        return $this->where($condition)->first();
    }

    public function updateCategoryBlog($value, $condition)
    {

        return $this->where($condition)->update($value);
    }
    public function GetCategoryBlog()
    {
        return $this->get();
    }
}
