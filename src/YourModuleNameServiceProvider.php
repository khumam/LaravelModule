<?php

/*
 * This file is part of the Laravel Module Template.
 *
 * (c) Khoerul Umam <id.khoerulumam@gmail.com>
 *
 */

namespace YourName\YourModuleName;

use Illuminate\Support\ServiceProvider;
use YourName\YourModuleName\YourModuleNamePublishCommand;

/**
 * Stock Module Service Provider
 */
class YourModuleNameServiceProvider extends ServiceProvider
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
                YourModuleNamePublishCommand::class,
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
