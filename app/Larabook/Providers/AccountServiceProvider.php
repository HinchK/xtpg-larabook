<?php namespace Larabook\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Larabook\Accounts\Providers\Google;

class AccountServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bindShared('Larabook\Accounts\Providers\Contracts\Provider', function($app)
        {
            return new Google($app['redirect'],  new Client ,getenv('G_CLIENT_ID'), getenv('G_CLIENT_SECRET'));
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('Larabook\Accounts\Providers\Contracts\Provider', function($app)
        {
            return new Google($app['redirect'],  new Client ,getenv('G_CLIENT_ID'), getenv('G_CLIENT_SECRET'));
        });
    }
}