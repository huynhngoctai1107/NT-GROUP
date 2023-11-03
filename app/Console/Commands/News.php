<?php

namespace App\Console\Commands;

use App\Http\Controllers\Client\Mail\MailLoginController;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class News extends Command
{




    public function __construct()
    {
        parent::__construct();
    }
    protected $signature = 'emailNew:cron';

    protected $description = 'Command description';

    public function handle()
    {
        $mail = new MailLoginController();
//        $threeMinutesAgo = Carbon::now()->subMinutes(1);
//
//        $users = DB::table('email_news')->where('created_at', '<=', $threeMinutesAgo)->get();
        $mail->loginMail();
    }
}
