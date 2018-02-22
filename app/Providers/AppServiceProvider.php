<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Illuminate\Pagination\AbstractPaginator::defaultView("pagination::bootstrap-4");
        \Illuminate\Pagination\AbstractPaginator::defaultSimpleView("pagination::simple-bootstrap-4");
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
