<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('admin.layout.master',function($view){
        $view->with([
        'hospital'   => request()->route('hospital'),
        'department' => request()->route('department'),
        'doctor' => request()->route('doctor')
        ]);
        });
    }
}
