<?php

namespace App\Http\Controllers\Admin\Transactions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RechargeHistoryController extends Controller
{
    function listRechargeHistory()
    {
        return view('transactions.rechargehistory');
    }
}
