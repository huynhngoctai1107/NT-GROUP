<?php

namespace App\Http\Controllers\Client\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionHistoryController extends Controller{

    public $transaction;

    public function __construct(){
        $this->transaction = new Transaction();
    }

    function getHistory(){

        $condition = [
            'id_user' => auth()->user()->id,
        ];

        return  $this->transaction->getHistory($condition);


    }

    function history(){
        return view('transactionhistory.rechargehistory');
    }
}