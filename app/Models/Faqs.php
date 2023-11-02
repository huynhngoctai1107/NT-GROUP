<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faqs extends Model{

    use HasFactory;
    protected $table = 'faqs';
    public function addContact($value){
        return $this->insert($value);
    }

    public function listContact($condition){
        return $this->where($condition)->paginate(5);
    }
    public function firstContact($condition){
        return $this->where($condition)->first();
    }
    public function deleteContact($condition){
        return $this->where($condition)->delete();
    }
    public function updateContact($condition, $value)
    {
        return $this->where($condition)->update($value);
    }
}
