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

    public function listDemand($condition)
    {
        return $this->orderBy('id', 'desc')->where($condition)->paginate(5);
    }
    public function searchDemand($condition)
    {
        return $this->where($condition)->orderBy('id', 'desc')->paginate(5);
    }
    public function GetDemand()
    {
        return $this->where('delete', 0)->get();
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
}
