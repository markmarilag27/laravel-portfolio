<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Laravel\Telescope\Telescope;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // @link https://github.com/barryvdh/laravel-ide-helper#installation
        if ($this->app->environment('local')) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        // @link https://laravel-news.com/disable-eloquent-lazy-loading-during-development
        if ($this->app->environment(['local', 'development', 'testing'])) {
            Model::preventLazyLoading();
        }

        // @link https://laravel.com/docs/9.x/telescope#migration-customization
        Telescope::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
