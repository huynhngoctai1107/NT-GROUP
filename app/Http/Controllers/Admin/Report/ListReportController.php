<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\Customer_reports;
use Illuminate\Http\Request;

class ListReportController extends Controller{

    public $Customer_reports;

    public function __construct(){
        $this->customer_reports = new Customer_reports();
    }

    public function ListReport(){

        $condition =
            ['customer_reports.delete' => 0 ];

        $data = $this->customer_reports->ListPostReport($condition);

        return view('Admin.Report.List', ['list' => $data]);
    }


    public function reportHistory(){
        $condition = [
            ['customer_reports.delete', '=', 1],
        ];
        $data      = $this->customer_reports->ListPostReport($condition);

        return view('Admin.Report.ReportHistory', ['page' => 'report', 'query' => $data]);
    }


    public function statusReport($Customer_reportsId){
        $condition = [
            'id'     => $Customer_reportsId,
            'status' => 0,
        ];

        $query     = $this->customer_reports->firstReport($condition);

        if (!$query){
            return redirect()
                ->back()
                ->with('error', "Cập nhật trạng thái thất bại khi đã xữ lý thành công");
        }
        $Customer_reports = Customer_reports::find($Customer_reportsId);

        if ($Customer_reports){
            if ($Customer_reports->status){
                $Customer_reports->status = 0;
            }else{
                $Customer_reports->status = 1;
            }
            $Customer_reports->save();
        }

        return redirect()
            ->back()
            ->with('success', "Cập nhật trại thái thành công");
    }

    public function searchReport(Request $request)
    {
        $condition = [
            ['customer_reports.delete', '=', 0],
            ['customer_reports.status', '=', 1],
        ];

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $condition[] = ['users.email', 'LIKE', "%$keyword%"];
        }

        $data = $this->customer_reports->ListPostReport($condition);

        if ($data->isEmpty()) {
            return view('Admin.Report.List', ['list' => $data])
                ->with('message', 'Không tìm thấy email báo báo cáo.');
        } else {
            return view('Admin.Report.List', ['list' => $data]);
        }
    }
}
