<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';

    public function addContact($data)
    {
        return $this->insert($data);
    }
    public function showContact($where)
    {
        return $this->where($where)->get();
    }
    public function updateContact($condition, $data )
    {
        return $this->where($condition)->update($data);
    }

//    public function addContact($value){
//        return $this->insert($value);
//    }
//    public function listContact($condition){
//        return $this->where($condition)->get();
//    }
//    public function deleteContact($condition){
//        return $this->where($condition)->delete();
//    }

}
