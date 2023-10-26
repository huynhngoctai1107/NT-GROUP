<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactClient extends Model{

    use HasFactory;
    protected $table = 'q&a';
    public function addContact($value){
        return $this->insert($value);
    }

    public function listContact($condition){
        return $this->where($condition)->paginate(4);
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
