<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Charts extends Model
{
    use HasFactory;
    protected $table = 'posts';

    public function getPostCharts($condition) {
        return $this->where($condition)
                    ->select('users.id', 'users.fullname', DB::raw('DATE(posts.created_at) as date'), DB::raw('COUNT(*) as post_count'))
                    ->join('users', 'users.id', '=', 'posts.id_user')
                    ->groupBy('users.id', 'date')
                    ->orderBy('date', 'asc')
                    ->get();
    }

    public function getRechargeCharts($condition)
    {
        return DB::table('users')
                 ->join('transactions', 'users.id', '=', 'transactions.id_user')
                 ->where($condition)
                 ->select('users.id', 'users.fullname', DB::raw('DATE(transactions.created_at) as date'), DB::raw('SUM(transactions.price) as transactions_sum'))
                 ->groupBy('users.id', 'date')
                 ->orderBy('date', 'asc')
                 ->get();
    }

    public function getPostsAdminCharts()
    {
        return $this->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as post_count'))
                    ->whereMonth('created_at', '=', now()->month) // Sử dụng hàm whereMonth để làm cho câu truy vấn rõ ràng hơn.
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->first();
    }


    public function getRechargeAdminCharts($condition)
    {
        return DB::table('transactions')
                 ->select(DB::raw('SUM(price) as recharge_price'))
                 ->whereMonth('created_at', '=', now()->month)
                 ->where($condition)
                 ->first();
    }



    public function getRecharmonth($condition)
    {
        $result = DB::table('transactions')
                    ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(price) as recharge_price'))
                    ->whereRaw('MONTH(created_at) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)')
                    ->where($condition)
                    ->groupBy('month')
                    ->orderBy('month', 'asc')
                    ->first();

        if ($result) {
            return $result;
        } else {
            return (object) [
                'month' => date('n') - 1,
                'recharge_price' => 0,
            ];
        }
    }

    public function getUserAdminCharts($condition)
    {
        return DB::table('users')
                 ->select(DB::raw('COUNT(*) as user_count'))
                 ->where($condition)
                 ->first();
    }

    public function getPostAdminViewCharts($condition) {
        return $this->where($condition)
                    ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as post_count'))
                    ->groupBy('date')
                    ->orderBy('date', 'asc')
                    ->get();
    }

    public function getUserCharts($condition) {
        return DB::table('users')
                 ->where($condition)
                 ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as user_count'))
                 ->groupBy('date')
                 ->orderBy('date', 'asc')
                 ->get();
    }

    public function getTransitionAdminCharts($condition){
        return DB::table('transactions')
                 ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(price) as transactions_sum'))
                 ->where($condition)
                 ->groupBy('date')
                 ->orderBy('date', 'asc')
                 ->get();
    }

    public function getCountVoucher($condition){
        return DB::table('transactions')
                 ->select(DB::raw('COUNT(voucher) as voucher_count'))
                ->where($condition)
                ->first();
    }

    public function getCountReport($condition){
        return DB::table('customer_reports')
                 ->select(DB::raw('COUNT(id) as report_count'))
                 ->where($condition)
                 ->first();
    }

    public function getCountEmail($condition){
        return DB::table('email_news')
                 ->select(DB::raw('COUNT(id) as email_count'))
                 ->where($condition)
                 ->first();
    }

    public function getCounFaqs($condition){
        return DB::table('faqs')
                 ->select(DB::raw('COUNT(id) as faqs_count'))
                 ->where($condition)
                 ->first();
    }

}
