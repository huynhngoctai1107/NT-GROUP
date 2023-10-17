<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Category extends Model
{

    use HasFactory;

    protected $table = 'category_posts';

    public function listCategory()
    {
        return $this->orderBy('id', 'desc')->paginate(5);
    }

    public function AddCategory($value)
    {

        return $this->insert($value);
    }

    public function editCategory($condition)
    {
        return $this->where($condition)->first();
    }

    public function updateCategory($value, $condition)
    {
        return $this->where($condition)->update($value);
    }

    public function deleteCategory($slug)
    {
        // Kiểm tra xem nhu cầu có sản phẩm nào không
        $demandHasProducts = $this->where('category_posts.slug', $slug)
            ->join('posts', 'category_posts.id', '=', 'posts.id_category')
            ->exists();

        if ($demandHasProducts) {
            return false; // Trả về false nếu có sản phẩm liên quan
        }

        // Nếu không có sản phẩm liên quan, xóa nhu cầu
        $this->where('category_posts.slug', $slug)->delete();

        return true; // Trả về true nếu xóa thành công
    }
}
