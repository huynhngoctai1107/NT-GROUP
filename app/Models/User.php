<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable{

    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $fillable = [
        'id',
        'id_role',
        'slug',
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

    public function addUsers($data){
        return $this->insert($data);
    }

    public function listUser($condition){

        return $this->orderBy('id', 'desc')->where($condition)->paginate(5);

    }

    public function deleteUser()
    {
        // Xóa liên kết trong bảng "Transaction"
        $this->transactions()->delete();
        $this->customerReports()->delete();

        // Xóa mềm tài khoản
        $this->delete();
        $this->save();
    }

    public function customerReports()
    {
        return $this->hasMany(Customer_reports::class, 'user_id');
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_user');
    }

    public function show($condition){
        return DB::table('roles')->where($condition)->get();
    }

    public function editUser($id){
        return $this->where('id', '=', $id)->first();
    }
    public function first($condition){
        return $this->select('users.id','slug','name','id_role','fullname','phone','image','email','address','gender','users.created_at')->where($condition)->join('roles','roles.id','=','users.id_role')->groupby('users.id')->first();
    }

    public function updateUser($data, $condition){
        return $this
            ->where($condition)
            ->update($data);
    }

    public function resetPassword($condition){
        return $this
            ->where($condition)
            ->first();
    }

    public function editPassword($condition, $data){
        return $this
            ->where($condition)
            ->update($data);
    }


}