<?php

namespace App\Providers;

use App\Models\Task;
use Illuminate\Support\ServiceProvider;

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
        //globalno dostupna variabla topTasks (dostupna za svaku rutu, celu app)

        view()->composer('components.footer', function(){
            view()->share('topTasks', Task::take(3)->latest()->get());
        });
        
    }
}
