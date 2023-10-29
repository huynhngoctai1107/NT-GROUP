<?php

namespace App\Http\Controllers\Admin\Transactions;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class RechargeHistoryController extends Controller
{
    public $transaction;

    public function __construct(){
        $this->transaction = new Transaction();
    }

    function listRechargeHistory()
    {
        $condition=[];
        $data=$this->transaction->listRechargeHistory($condition);

        return view('transactions.rechargehistory',['list' => $data]);
    }
}
