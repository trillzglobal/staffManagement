<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Copyright;
use App\Language;
use App\Logo;
use App\Signature;
use View;


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
           View::composer('*', function($view){
            $view->with('copyright',Copyright::latest()->first());

            $view->with('notification', auth()->user()->unreadNotifications ?? 0);
            $view->with('language_top', Language::latest()->get());
            $view->with('sitename', Logo::first());
            $view->with('signature', Signature::first());

        });

       
    }
}
