<?php
namespace App\Console;

use App\Console\Commands\CreateAutobots;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        
        $schedule->command(CreateAutobots::class)->hourly();
    }

  
}

