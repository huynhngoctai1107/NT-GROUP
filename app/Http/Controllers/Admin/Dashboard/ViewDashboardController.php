<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewDashboardController extends Controller
{
   public function dashboar()
   {
    return view('admin.dashboar.viewdashboar');
   }
}
