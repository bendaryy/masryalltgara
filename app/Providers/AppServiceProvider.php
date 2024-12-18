<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Apisetting;
use App\Models\Company;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->share('setting', Apisetting::first());
        // view()->share('company', Company::first());
        Paginator::useBootstrap();
    }
}
