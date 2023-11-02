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

        return $this->select('fullname','phone', 'wallet', 'id_category_transaction',
            'transactions.created_at', 'transactions.surplus', 'transactions.status',
            'transactions.content', 'price','voucher', 'transaction_categories.name as name_category',
            'payment_methods.name as method')
                    ->join('transaction_categories', 'transaction_categories.id', '=',
                        'transactions.id_category_transaction')
                    ->join('users', 'users.id', '=', 'transactions.id_user')
                    ->join('payment_methods', 'payment_methods.id', '=', 'transactions.id_method')
                    ->groupby('transactions.id')
                    ->orderBy('transactions.id', 'desc')
                    ->where($condition)
                    ->get();

    }

    public function listRechargeHistory($condition){


        return $this->select('fullname', 'phone', 'wallet', 'id_category_transaction',
            'transactions.created_at', 'transactions.surplus', 'transactions.status',
            'transactions.content', 'price', 'voucher',
            'transaction_categories.name as name_category',
            'payment_methods.name as method')
                    ->join('transaction_categories', 'transaction_categories.id', '=',
                        'transactions.id_category_transaction')
                    ->join('users', 'users.id', '=', 'transactions.id_user')
                    ->join('payment_methods', 'payment_methods.id', '=', 'transactions.id_method')
                    ->groupby('transactions.id')
                    ->orderBy('transactions.id', 'desc')
                    ->where($condition)
                    ->paginate(5);

    }

    public function addTransaction($data){
        return $this->insert($data);
    }

}
