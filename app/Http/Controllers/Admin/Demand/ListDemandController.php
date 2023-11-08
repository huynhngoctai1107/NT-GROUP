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
        $data = $this->demand->listDemand();
        return view('admin.demandcategory.list', ['page' => 'demand', 'query' => $data]);
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
            return view('admin.demandcategory.list', ['page' => 'demand', 'query' => $data])
                ->with('message', 'Không tìm thấy kết quả.');
        } else {
            return view('admin.demandcategory.list', ['page' => 'demand', 'query' => $data]);
        }
    }
}
