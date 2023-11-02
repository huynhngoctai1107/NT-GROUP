<?php

namespace App\Http\Controllers\Admin\Repost;

use App\Http\Controllers\Controller;
use App\Models\Customer_reports;
use Illuminate\Http\Request;

class ListReportController extends Controller
{
    public $Customer_reports;

    public function __construct(){
        $this->customer_reports = new Customer_reports();
    }

    public function ListRepost(){

        $condition=['delete'=>0];

        $data=$this->customer_reports->ListPostRepost($condition);
        $data=$this->customer_reports->ListRepost($condition);

        return view('admin.repost.list', ['list' => $data]);
    }


    public function statusReport($Customer_reportsId)
    {
        $Customer_reports = Customer_reports::find($Customer_reportsId);

        if ($Customer_reports) {
            if ($Customer_reports->status) {
                $Customer_reports->status = 0;
            } else {
                $Customer_reports->status = 1;
            }
            $Customer_reports->save();
        }
        return back();
    }




}
