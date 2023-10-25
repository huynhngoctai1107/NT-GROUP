<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Transaction extends Model{

    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'transactions';


    public function getHistory($condition){
        return $this->join('transaction_categories', 'transaction_categories.id', '=',
            'transactions.id_category_transaction')
            ->join('users','users.id','=','transactions.id_user')
                    ->groupby('transactions.id')->where($condition)->get();


    }
}
