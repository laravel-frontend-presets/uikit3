<?php

namespace OwenMelbz\UIKit3Preset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class UIKit3PresetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        PresetCommand::macro('uikit3', function ($command) {
            UIKit3Preset::install();

            $command->info('UIKit3 scaffolding installed successfully.');
            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }
}
