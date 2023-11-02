<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $table = 'email_news';

    public function ListEmail($condition){
        return $this->where($condition)->paginate(5);
    }
    public function addEmail($value){
        return $this->insert($value);
    }
    public function updateEmail($condition, $value)
    {
        return $this->where($condition)->update($value);
    }
}
