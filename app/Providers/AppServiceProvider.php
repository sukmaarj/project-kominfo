<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;


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
        Paginator::useBootstrap();

        Gate::define('admin', function(User $user) {
            return $user->is_admin;
        });



        \URL::forceRootUrl(\Config::get('app.url'));    
// And this if you wanna handle https URL scheme
// It's not usefull for http://www.example.com, it's just to make it more independant from the constant value
if (\Str::contains(\Config::get('app.url'), 'https://')) {
    \URL::forceScheme('https');
    //use \URL:forceSchema('https') if you use laravel < 5.4
}
    }
}
