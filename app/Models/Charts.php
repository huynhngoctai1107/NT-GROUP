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
}
