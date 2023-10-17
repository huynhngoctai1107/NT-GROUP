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
}
