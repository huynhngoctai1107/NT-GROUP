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
        $condition = [
            ['slug', '=', $slug],
        ];
        $value = [
            'delete' => 1,
        ];
        $this->demand->updateDemand($value, $condition);
        return redirect()->back()->with('success', 'Đã xóa nhu cầu thành công');
    }

    function restoreDemand($slug)
    {
        $condition = [
            ['slug', '=', $slug],
        ];
        $value = [
            'delete' => 0,
        ];
        $this->demand->updateDemand($value, $condition);
        return redirect()->back()->with('success', 'Đã khôi phục nhu cầu thành công');
    }
}
