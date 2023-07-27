<?php

namespace Kolirt\ModelFilter;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{

    /**
     * Commands
     *
     * @var array
     */
    protected $commands = [
        Commands\InstallCommand::class
    ];

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/model-filter.php', 'model-filter');

        $this->publishes([
            __DIR__ . '/../config/model-filter.php' => config_path('model-filter.php')
        ]);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->commands($this->commands);
    }
}