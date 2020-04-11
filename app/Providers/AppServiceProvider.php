<?php

namespace App\Providers;

use App\Language;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Config;

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
//        Config::set('app.languages', Language::all()->toArray());
        Schema::defaultStringLength(191);
    }
}
