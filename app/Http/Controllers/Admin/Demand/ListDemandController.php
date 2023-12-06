<?php

namespace App\Http\Controllers\Admin\Demand;

use App\Http\Controllers\Controller;
use App\Models\Demand;
use Illuminate\Http\Request;

class ListDemandController extends Controller
{

    public $demand;
    public function __construct()
    {
        $this->demand = new Demand();
    }

    function listDemand()
    {
        $condition = [
            ['delete', '=', 0],
        ];
        $data = $this->demand->listDemand($condition);
        return view('Admin.DemandCategory.List', ['page' => 'demand', 'query' => $data]);
    }

    function listHistoryDemand()
    {
        $condition = [
            ['delete', '=', 1],
        ];
        $data = $this->demand->listDemand($condition);
        return view('Admin.DemandCategory.History', ['page' => 'demand', 'query' => $data]);
    }

    function searchDemand(Request $request)
    {
        $condition =[];
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $condition[] = ['name', 'LIKE', "%$keyword%"];
        }
        $data = $this->demand->searchDemand($condition);
        if ($data->isEmpty()) {
            return view('Admin.DemandCategory.List', ['page' => 'demand', 'query' => $data])
                ->with('message', 'Không tìm thấy kết quả.');
        } else {
            return view('Admin.DemandCategory.List', ['page' => 'demand', 'query' => $data]);
        }
    }
}
