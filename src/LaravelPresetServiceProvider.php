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

            $command->info('Preset installed!');
            $command->info('To finish setup, run one of the following commands:');
            $command->info('If using npm:');
            $command->comment('npm install && node_modules/.bin/tailwind init && npm run dev');
            $command->info('If using yarn:');
            $command->comment('yarn && node_modules/.bin/tailwind init && yarn run dev');
            $command->info('NOW you can build someting amazing!!');
        });
    }
}