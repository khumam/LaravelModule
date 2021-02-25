<?php

/*
 * This file is part of the Stock Module package.
 *
 * (c) Khoerul Umam <id.khoerulumam@gmail.com>
 *
 */

namespace BarraDev\StockModule;

use Illuminate\Support\ServiceProvider;
use BarraDev\StockModule\StockModulePublishCommand;

/**
 * Stock Module Service Provider
 */
class StockModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                StockModulePublishCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
