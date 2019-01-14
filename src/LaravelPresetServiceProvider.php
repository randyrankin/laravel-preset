<?php

namespace RandyRankin\LaravelPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class LaravelPresetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        PresetCommand::macro('randyrankin', function ($command) {
            Preset::install();

            $command->info('Preset installed. To finish setup, run:');
            $command->info('npm install && node_modules/.bin/tailwind init && npm run dev');
        });
    }
}