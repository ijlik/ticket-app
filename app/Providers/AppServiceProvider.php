<?php

namespace App\Providers;

use Illuminate\Support\Collection;
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
        Collection::macro('exactMatch', function ($value, string|array $column) {
            return $this->filter(function ($item) use ($value, $column) {
                if (is_array($column)) {
                    return collect($column)->contains(function ($col) use ($item, $value) {
                        return str_contains(strtolower(data_get($item, $col)), strtolower($value));
                    });
                } else {
                    return str_contains(strtolower(data_get($item, $column)), strtolower($value));
                }
            });
        });
    }
}
