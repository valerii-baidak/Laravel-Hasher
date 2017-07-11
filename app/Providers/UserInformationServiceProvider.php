<?php

namespace App\Providers;

use App\Services\UserInformation;
use Illuminate\Support\ServiceProvider;

class UserInformationServiceProvider extends ServiceProvider
{


    protected $defer = true;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Services\UserInformation::class', function(){
            return new UserInformation();
        });
    }

    public function provides()
    {
        return ['App\Services\UserInformation::class'];
    }
}
