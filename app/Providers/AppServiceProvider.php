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
        $data['basic'] = (object)config('basic');
        $data['theme'] = template();
        $data['themeTrue'] = template(true);
       
        View::share($data);

        
        if (config('basic.force_ssl') == 1) {
            if ($this->app->environment('production') || $this->app->environment('local')) {
                \URL::forceScheme('https');
            }
        }
        
    }
}
