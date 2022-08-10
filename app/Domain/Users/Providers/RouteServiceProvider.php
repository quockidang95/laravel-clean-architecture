<?php

namespace App\Domain\Users\Providers;

use App\Domain\Users\Entities\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::model('user', User::class);
        
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api/users')
                ->group(base_path('app/Domain/Users/Routes/user.php'));
        });
    }
}