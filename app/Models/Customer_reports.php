<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class Customer_reports extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'Customer_reports';

    protected $fillable = [
        'id',
        'user_id',
        'post_id',
        'content',
        'delete',
        'status',
        'created_at',
    ];

    public function ListRepost($condition)
    {
        return $this->join('users', 'users.id', '=', 'Customer_reports.user_id')
                    ->where('Customer_reports.delete', $condition['delete'])
                    ->paginate(5);
    }

    public function ListPostRepost($condition)
    {
        return $this->join('posts', 'posts.id', '=', 'Customer_reports.post_id')
                    ->where('Customer_reports.delete', $condition['delete'])
                    ->get();
    }

    public function getTitleAttribute()
    {
        $post = Post::find($this->post_id);
        if ($post) {
            return $post->title;
        }
        return null;
    }

    public function deleteReport()
    {
        $this->delete = 0;
        $this->save();
    }

    public function updateReport($data, $condition)
    {
        return DB::table('customer_reports')
                 ->where($condition)
                 ->update($data);
    }



}