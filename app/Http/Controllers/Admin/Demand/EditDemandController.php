<?php

namespace App\Http\Controllers\Admin\Demand;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditDemandRequest;
use App\Models\Demand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EditDemandController extends Controller
{
    public $demand;
    public function __construct()
    {
        $this->demand = new Demand();
    }

    function editFormDemand($slug)
    {
        $condition = [
            ['slug', '=', $slug],
        ];
        $data = $this->demand->editDemand($condition);
        return view('admin.demandcategory.edit', ['page' => 'demand', 'data' => $data]);
    }
    function editDemand(EditDemandRequest $request, $slug)
    {
        $condition = [
            ['slug', '=', $slug],
        ];
        $value = [
            'name' => $request->input('demand'),
            'slug' => Str::slug($request->input('demand')),
            'note' => $request->input('note', ''),
            'updated_at'  => date('y-m-d H:i:s')
        ];
        $data = $this->demand->updateDemand($value, $condition);
        return redirect()->route('listDemand')->with('success', 'Đã sửa nhu cầu thành công');
    }
}
