<?php

namespace App\Http\Controllers\Admin\Repost;

use App\Http\Controllers\Controller;
use App\Models\Customer_reports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteReportController extends Controller
{

    public function deleteReport($id)
    {
        $customerReport = Customer_reports::find($id);

        if ($customerReport) {
            $customerReport->delete = 1;
            $customerReport->save();
        }

        return back();
    }
}
