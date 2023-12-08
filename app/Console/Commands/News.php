<?php

namespace App\Console\Commands;

use App\Http\Controllers\Client\Mail\MailLoginController;
use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Email;
use Illuminate\Support\Facades\Mail;

class News extends Command{


    public function __construct(){
        parent::__construct();
    }

    protected $signature = 'emailNew:cron';

    protected $description = 'Command description';

    public function handle(){

        $email     = new Email();
        $newPosts  = Post::where('created_at', '>', now()->subDays(7))->paginate(5);

        if ($newPosts->isEmpty()) {
            $this->info('Không có bài viết mới.');
            return;
        }
        $condition = [
            'delete' => 0,
        ];
        $customers  = $email->getAll($condition);
        if ($customers->isEmpty()) {
            $this->info('Không có tài người đăng ký.');
            return;
        }
        foreach ($customers as $customer){
            $dataPost =[
                'post' =>$newPosts ,
                'customer' =>$customer
            ] ;
            Mail::send('Client.Mail.MailNews', compact('dataPost'), function ($message) use ($dataPost){
                $message->subject('NT-GROUP - Thông báo bài viết mới nhất');
                $message->to($dataPost['customer']->email);
            });

        }
    }
}
