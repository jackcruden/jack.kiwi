<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Blade::directive('active', function ($expression) {
            return "<?php echo request()->is($expression) ? 'active' : ''; ?>";
        });
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }
}
