<?php


namespace Pondit\Mailer;


use Illuminate\Support\ServiceProvider;

class MailerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'mailer');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
//        $this->mergeConfigFrom(__DIR__.'/config/mailer.php', 'mailer');
    }

    public function register()
    {
    }

}
