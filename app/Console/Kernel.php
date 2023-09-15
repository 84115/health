<?php

namespace App\Console;

use App\Console\Commands\TryAllHealthEnabledChecks;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use UKFast\HealthCheck\Commands\CacheSchedulerRunning;

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
        $schedule->command(CacheSchedulerRunning::class)->everyTwoHours();

        $schedule->command(TryAllHealthEnabledChecks::class)->everyTwoHours();
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
