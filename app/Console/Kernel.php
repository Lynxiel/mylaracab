<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->exec('/opt/php/8.1/bin/php /var/www/u1707254/data/www/kabelopt71.ru/artisan db:seed CableSeeder')
            ->daily()
            ->emailOutputTo(config('mail.reply_to.address'))
            ->sendOutputTo(base_path('logs/exchange.text'));

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
