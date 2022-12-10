<?php

namespace MauroBaptista\Elements;

use Illuminate\Support\ServiceProvider as BaseServiceProvide;
use Illuminate\Support\Facades\Blade;
use MauroBaptista\Elements\Services\Colors\Colors;

class ServiceProvider extends BaseServiceProvide
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/elements.php' => config_path('elements.php'),
        ]);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'elements');

        $this->app->bind(Colors::class, fn() => new Colors(config('elements.colors')));
    }
}