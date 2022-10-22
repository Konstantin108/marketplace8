<?php

namespace App\Providers;

use App\Services\ParserService;
use Illuminate\Support\ServiceProvider;

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
        //Paginator::useBootstrap();

        $this->app->bind(ParserService::class, function () {
            return new ParserService();
        });
    }
}
