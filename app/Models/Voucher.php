<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Voucher extends Model{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $table = 'vouchers';

    public function listVoucher($condition){
        return $this->orderBy('id', 'desc')->where($condition)->paginate(5);
    }

    public function addVoucher($value){
        return $this->insert($value);
    }

    public function show($condition){
        return DB::table($this->table)->where($condition)->get();
    }

    public function editVoucher($condition){
        return $this->where($condition)->first();
    }

    public function deleteVoucher($id){
        $this->delete(); // Xoá mềm voucher

        return $this->where($id)->delete();
    }

    public function updateVoucher($condition, $value){

            return $this->where($condition)->update($value);

    }
}