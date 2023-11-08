<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $table = 'email_news';
    protected $fillable = [
        'id',
        'email',
        'interaction_count',
        'delete',
        'created_at',
        'updated_at',

    ];
    public function ListEmail($condition){
        return $this->where($condition)->paginate(5);
    }
    public function getAll($condition){
        return $this->where($condition)->get();
    }
    public function first($condition){
        return $this->where($condition)->first();
    }
    public function addEmail($value){
        return $this->insert($value);
    }
    public function updateEmail($condition, $value)
    {
        return $this->where($condition)->update($value);
    }
}
