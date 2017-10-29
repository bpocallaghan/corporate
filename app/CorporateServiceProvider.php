<?php

namespace Bpocallaghan\Corporate;

use Illuminate\Support\ServiceProvider;
use Bpocallaghan\Corporate\Commands\PublishCommand;

class CorporateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views/admin', 'admin.corporate');
        $this->loadViewsFrom(__DIR__ . '/../resources/views/website', 'website.corporate');

        $this->registerCommand(PublishCommand::class, 'publish');
    }

    /**
     * Register a singleton command
     *
     * @param $class
     * @param $command
     */
    private function registerCommand($class, $command)
    {
        $path = 'bpocallaghan.corporate.commands.';
        $this->app->singleton($path . $command, function ($app) use ($class) {
            return $app[$class];
        });

        $this->commands($path . $command);
    }
}
