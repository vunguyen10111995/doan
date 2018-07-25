<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Service;
use App\Models\TrackingService as Tracking;
use Carbon\Carbon;

class TrackingService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'service:tracking-service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tracking Total Service About Day';
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $total_service = count(Service::where('status', 'approved')->get());

        $info = Tracking::create([
            "total_services" => $total_service,
            "date" => Carbon::yesterday(),
            "created_at" => Carbon::now(),
        ]);
    }
}
