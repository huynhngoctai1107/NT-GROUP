<?php

namespace App\Http\Controllers\Admin\Demand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Demand\AddDemandRequest;
use App\Models\Demand;
use Illuminate\Support\Str;

class AddDemandController extends Controller
{

    public $demand;
    public function __construct()
    {
        $this->demand = new Demand();
    }

    function addFormDemand()
    {
        return view('Admin.DemandCategory.Add', ['page' => 'demand']);
    }

    function addDemand(AddDemandRequest $request)
    {
        $value = [
            'name' => $request->input('demand', ''),
            'slug' => Str::slug($request->input('demand', '')),
            'note' => $request->note ?? '',
            'created_at'  => date('y-m-d H:i:s')
        ];
        $data = $this->demand->addDemands($value);
        return redirect()->route('listDemand')->with('success', 'Đã thêm nhu cầu thành công');
    }
}
