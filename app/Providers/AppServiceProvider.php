<?php

namespace App\Providers;

use App\Domain\Repository\Task\TaskRepository;
use App\Infrastructure\Eloquent\Repository\TaskEloquentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /**
        *Diz para o laravel qual implementação usar
        **/
        $this->app->bind(
            TaskRepository::class,
            TaskEloquentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
