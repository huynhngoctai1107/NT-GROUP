<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use App\Models\Oders;
use GuzzleHttp\Psr7\Request;

class User extends Authenticatable{

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    //đăng ký
    protected $fillable = [
        'id',
        'id_role',
        'social_id',
        'image',
        'fullname',
        'email',
        'phone',
        'address',
        'token',
        'password',
        'wallet',
        'gender',
        'status',

    ];
    protected $table = 'users';

    public function addUsers($data){
        return $this->insert($data);
    }

    public function updateUser($data, $condition){
        return $this
            ->where($condition)
            ->update($data);
    }

    //quên mật khẩu
    public function resetPassword($condition){
        return $this
            ->where($condition)
            ->first();
    }
    public function editPassword($email,$data){
        return $this
           ->where('email','=',$email)
           ->update($data);
    }
}
