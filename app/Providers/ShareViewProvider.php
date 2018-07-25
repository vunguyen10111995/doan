<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Models\User;
// use App\Models\Plan;
// use App\Models\RequestService;

class ShareViewProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer('admin._section.head', function($view) {
            // $users = User::where('status', '=', config('setting.status.inprogress'))->get();
            // $plans = Plan::where('status', '=', config('setting.status.inprogress'))->get();
            // $request_services = RequestService::where('status', '=', config('setting.status.inprogress'))->get();
            // $data = array(
            // 'users' => $users,
            // 'plans' => $plans,
        //     'request_services' => $request_services,
        // );
        //     $view->with('data', $data);
        // });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
