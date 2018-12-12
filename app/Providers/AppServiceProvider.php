<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema ;
use Illuminate\Http\Resources\Json\Resource;

use App\Console\Commands\ModelMakeCommand;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(env('APP_ENV') == 'production') {
            \URL::forceScheme('https');

        }

        Resource::WithoutWrapping();
        Schema::defaultStringLength(191) ;
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //this is to enforce the models created with artisan to be created in App\Models
        $this->app->extend('command.model.make', function ($command, $app) {
            return new ModelMakeCommand($app['files']);
        });
    }
}
