<?php

namespace App\Http\Controllers\Client\TransactionHistory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionHistoryController extends Controller
{
    function history()
    {
        return view('client.pages.transactionhistory');
    }
}
