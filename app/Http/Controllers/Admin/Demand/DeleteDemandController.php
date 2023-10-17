<?php

namespace App\Http\Controllers\Admin\Demand;

use App\Http\Controllers\Controller;
use App\Models\Demand;
use Illuminate\Http\Request;

class DeleteDemandController extends Controller
{

    public $demand;
    public function __construct()
    {
        $this->demand = new Demand();
    }

    function deleteDemand($slug)
    {
        //        $data = $this->demand->deleteDemand($slug);
        //        return redirect()->back()->with('success','Đã xóa nhu cầu thành công');

        $result = $this->demand->deleteDemand($slug);

        if ($result === false) {
            return redirect()->back()->with('error', 'Không thể xóa nhu cầu vì đang chứa bài viết.');
        }

        return redirect()->back()->with('success', 'Nhu cầu đã được xóa thành công.');
    }
}
