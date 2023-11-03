<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\Customer_reports;

class ListReportController extends Controller{

    public $Customer_reports;

    public function __construct(){
        $this->customer_reports = new Customer_reports();
    }

    public function ListReport(){

        $condition =
            ['customer_reports.delete' => 0
            ];

        $data = $this->customer_reports->ListPostReport($condition);

        return view('admin.report.list', ['list' => $data]);
    }


    public function reportHistory(){
        $condition = [
            ['customer_reports.delete', '=', 1],
        ];
        $data = $this->customer_reports->ListPostReport($condition);

        return view('admin.report.ReportHistory', ['page' => 'report', 'query' => $data]);
    }


    public function statusReport($Customer_reportsId){
        $Customer_reports = Customer_reports::find($Customer_reportsId);

        if ($Customer_reports){
            if ($Customer_reports->status){
                $Customer_reports->status = 0;
            }else{
                $Customer_reports->status = 1;
            }
            $Customer_reports->save();
        }

        return back();
    }


}