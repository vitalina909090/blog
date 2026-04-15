<?php

namespace App\Providers;


use App\Composers\RoleComposer;
use App\Models\Post;
use App\Policies\PostPolicy;
use App\Services\IconService;
use App\Services\LoggerService;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
//    protected $policies = [
//        Post::class => PostPolicy::class,
//    ];


    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(LoggerService::class, function($app) {
            return new LoggerService(storage_path('logs/app.log'));
        });

        $this->app->singleton(IconService::class, function($app) {
            return new IconService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('global', function(Request $request) {
            return Limit::perMinute(60);
        });

        RateLimiter::for('std', function (Request $request) {
            return Limit::perMinute(60)
                ->by($request->ip());
        });

        RateLimiter::for('reg-api', function (Request $request) {
            return $request->user() ?
                Limit::perMinute(100)->by($request->user()->id) :
                Limit::perMinute(60)->by($request->ip());
        });

        Route::bind('post', function($value) {
            return Post::where('slug', $value)->first() ??
                Post::findOrFail($value);
        });

        ///////
        Blade::directive('isAdmin', function ($expression) {
            return "<?php if(Auth::check() && Auth::user()->role === 'admin'): ?>";
        });

        ///////
        Blade::directive('endIsAdmin', function ($expression) {
            return "<?php endif; ?>";
        });

        ///////
        View::composer('*', RoleComposer::class);


        // ------------------------------ GATES ----------------------------
//        Gate::define('access-admin-panel', function ($user) {
//            return $user->role === 'admin';
//        });
//
//        Gate::define('delete-any-post', function ($user) {
//            return $user->role === 'admin';
//        });
//
//        Gate::define('create-post', function ($user) {
//            return $user->email_verified_at !== null;
//        });


    }
}
