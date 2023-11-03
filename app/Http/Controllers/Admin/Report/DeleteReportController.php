<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\Customer_reports;

class DeleteReportController extends Controller{

    public $Customer_reports;

    public function __construct(){
        $this->customer_reports = new Customer_reports();
    }


    public function deleteReport($id){
        $condition = [
            ['id', '=', $id],
        ];
        $value     = [
            'delete' => 1,
            'status' => 1,
        ];
        $data      = $this->customer_reports->updateReport($value, $condition);

        return redirect()->back()->with('success', 'Báo cáo đã được xóa thành công.');
    }

    public function restoreReport($id){
        $customerReport = Customer_reports::find($id);

        if ($customerReport){
            $customerReport->delete = 0;
            $customerReport->save();
        }

        return redirect()->back()->with('success', 'Báo cáo đã được khôi phục thành công.');
    }
}
