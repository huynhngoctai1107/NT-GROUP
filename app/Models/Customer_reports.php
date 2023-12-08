<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class Customer_reports extends Model{

    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'customer_reports';

    protected $fillable = [
        'id',
        'user_id',
        'post_id',
        'content',
        'delete',
        'status',
        'created_at',
    ];

    public function ListReport($condition){
        return $this->orderBy('id', 'desc')->where($condition)->paginate(5);
    }
    public function firstReport($condition){
        return $this->where($condition)->first();
    }


    public function ListPostReport($condition){
        return $this->select('customer_reports.id as id_report','user_id','post_id','Customer_reports.content','Customer_reports.delete as delete_report','Customer_reports.status as status_report','Customer_reports.created_at as created_at_report','Customer_reports.updated_at as updated_at_report','fullname','email')->
                    join('users', 'users.id', '=', 'Customer_reports.user_id')
                    ->join('posts','posts.id','=','Customer_reports.post_id')
                    ->where($condition)
                     ->groupby('customer_reports.id')
                    ->paginate(5);
    }



    public function AddReport($values){
        return $this->insert($values);


    }

    public function getTitleAttribute(){
        $post = Post::find($this->post_id);
        if ($post){
            return $post->title;
        }

        return NULL;
    }



    public function updateReport($data, $condition){
        return $this
            ->where($condition)
            ->update($data);
    }




}