<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\PostType;
use App\Project;
use App\Models\Tag;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));
        });

        Route::bind('blog', function ($slug) {
            return Post::whereType(PostType::Blog)->whereSlug($slug)->firstOrFail();
        });

        Route::bind('project', function ($slug) {
            return Post::whereType(PostType::Project)->whereSlug($slug)->firstOrFail();
        });

        Route::bind('sketch', function ($slug) {
            return Post::whereType(PostType::Sketch)->whereSlug($slug)->firstOrFail();
        });

        Route::bind('tag', function ($slug) {
            return Tag::whereSlug($slug)->firstOrFail();
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
