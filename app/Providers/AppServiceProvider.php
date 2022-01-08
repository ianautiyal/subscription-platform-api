<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;

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
        Builder::macro('jsonPaginate', function (...$arguments) {
            $paginator = $this->paginate(...$arguments);

            return [
                'items' => $paginator->items(),
                'total' => $paginator->total(),
            ];
        });
    }
}
