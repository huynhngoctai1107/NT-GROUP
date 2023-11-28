<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBlog extends Model
{
    use HasFactory;
    protected $table = 'category_blogs';

    public function listCategoryBlog($condition)
    {
        return $this->orderBy('id', 'desc')->where($condition)->paginate(5);
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
        return $this->where('delete', 0)->get();
    }

    public function deleteCategoryBlog($slug)
    {
        // Kiểm tra xem nhu cầu có sản phẩm nào không
        $demandHasProducts = $this->where('category_blogs.slug', $slug)
                                  ->join('blogs', 'category_blogs.id', '=', 'blogs.id_category_blog')
                                  ->exists();

        if ($demandHasProducts) {
            return false; // Trả về false nếu có sản phẩm liên quan
        }

        // Nếu không có sản phẩm liên quan, xóa nhu cầu
        $this->where('category_blogs.slug', $slug)->delete();

        return true; // Trả về true nếu xóa thành công
    }
}
