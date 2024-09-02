<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use App\Listeners\NotifyUserOfFailedJob;
use Illuminate\Support\Facades\Event;

=======
use Illuminate\Database\Schema\Builder;
>>>>>>> origin/master

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
        Builder::defaultStringLength(191);
    }
}
