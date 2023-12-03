<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\News;
class   Kernel extends ConsoleKernel
{
    /*** * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
//        $schedule->command('emailNew:cron')->timezone('Asia/Ho_Chi_Minh')->everyTwoSeconds();
        $schedule->command('emailNew:cron')->timezone('Asia/Ho_Chi_Minh')->weekly();

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
