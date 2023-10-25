<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Demand extends Model
{
    use HasFactory;
    protected $table = 'demands';

    public function listDemand()
    {
        return $this->orderBy('id', 'desc')->paginate(5);
    }
    public function GetDemand()
    {
        return $this->get();
    }

    public function addDemands($value)
    {
        return $this->insert($value);
    }

    public function editDemand($condition)
    {
        return $this->where($condition)->first();
    }

    public function updateDemand($value, $condition)
    {

        return $this->where($condition)->update($value);
    }

    public function deleteDemand($slug)
    {
        // Kiểm tra xem nhu cầu có sản phẩm nào không
        $demandHasProducts = $this->where('demands.slug', $slug)
            ->join('medias', 'demands.id', '=', 'medias.id_demand')
            ->exists();

        if ($demandHasProducts) {
            return false; // Trả về false nếu có sản phẩm liên quan
        }

        // Nếu không có sản phẩm liên quan, xóa nhu cầu
        $this->where('demands.slug', $slug)->delete();

        return true; // Trả về true nếu xóa thành công
    }
}
