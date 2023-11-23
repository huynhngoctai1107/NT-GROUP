<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Follower extends Model{

    use HasFactory;

    protected $table = 'followers';

    public function getFollowers($condition, $join, $group){
        return $this->select('users.id', 'slug', 'name', 'id_role', 'fullname', 'phone', 'image',
            'email', 'address', 'gender', 'users.created_at', 'users.delete', 'users.status')
                    ->where($condition)
                    ->leftJoin('users', 'users.id', '=', "followers.$join")
                    ->Join('roles', 'roles.id', '=', 'users.id_role')
                    ->groupby($group)->get();
    }

    public function sumTotal($condition, $colum){
        return $this->select(DB::raw("COUNT($colum) AS sum_follower"))->where($condition)->first();
    }

    public function first($conditon){
        return $this->where($conditon)->first();
    }

    public function unFollow($condition){
        return $this->where($condition)->delete();
    }
    public function addFollower($values){
        return $this->insert($values);
    }


}
