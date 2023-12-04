<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Client\Transaction\TransactionHistoryController;
use App\Http\Controllers\Controller;
use App\Models\Charts;
use App\Models\PaymentMethod;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewDashboardController extends Controller
{
    public $user;
    public $transaction;
    public $method;
    public $charts;
    public function __construct(){
        $this->method = new PaymentMethod();
        $this->user = new User();
        $this->transaction =new TransactionHistoryController() ;
        $this->charts = new Charts();
    }
   public function dashboar()
   {
       $data = $this->charts->getPostsAdminCharts();
       // doanh thu tháng
       $condition = [
           'id_category_transaction' => 1,
       ] ;
       $recharge = $this->charts->getRechargeAdminCharts($condition);
       $recharmonth = $this->charts->getRecharmonth($condition);
       $condition = [
           'id_role' => 3
       ] ;
       $user = $this->charts->getUserAdminCharts($condition);

       // posts charts
       $condition = [
           'featured_news'=>1,
       ] ;
       $postVip = $this->charts->getPostAdminViewCharts($condition);
       $condition = [
           'featured_news'=>0,
       ] ;
       $post = $this->charts->getPostAdminViewCharts($condition);
       $condition = [] ;
       $dates = $this->charts->getPostAdminViewCharts($condition);
       //user charts
       $condition = [
           'id_role' => 3
       ] ;
       $usercharts = $this->charts->getUserCharts($condition);

       // transition

       $condition = [
           'id_category_transaction'=>1,
       ] ;
       $transitionPay = $this->charts->getTransitionAdminCharts($condition);
       $condition = [
           'id_category_transaction'=>2,
       ] ;
       $transitionMua = $this->charts->getTransitionAdminCharts($condition);
       $condition = [] ;
       $DateTransition = $this->charts->getTransitionAdminCharts($condition);

       // voucher
       $condition = [
           ['voucher', '!=', '']
       ];
       $voucher = $this->charts->getCountVoucher($condition);

       // report
       $condition = [
           'status'=>0,
       ] ;
       $report = $this->charts->getCountReport($condition);

       // email news
       $condition = [] ;
       $email = $this->charts->getCountEmail($condition);

       // faqs
       $condition = [
           'status'=>0,
       ] ;
       $faqs = $this->charts->getCounFaqs($condition);
    return view('admin.dashboar.viewdashboar',[
        'data'=>$data,
        'recharge'=>$recharge,
        'recharmonth'=>$recharmonth,
        'user'=>$user,
        'vip'=>$postVip,
        'charts'=>$post,
        'dates'=>$dates,
        'userchart'=>$usercharts,
        'transitionPay'=>$transitionPay,
        'transitionMua'=>$transitionMua,
        'dateT'=>$DateTransition,
        'voucher'=>$voucher,
        'report'=>$report,
        'email'=>$email,
        'faqs'=>$faqs]);
   }
}
