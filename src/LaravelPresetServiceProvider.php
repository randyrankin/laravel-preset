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
            LaravelPreset::install(false);

            $command->info('A custom Laravel preset with Vue and TailwindCSS has been installed!');
            $command->info('To finish setup, run one of the following commands:');
            $command->info('If you are using npm: npm install && ./node_modules/.bin/tailwind init && npm run dev');
            $command->info('If you are using yarn: yarn && ./node_modules/.bin/tailwind init && yarn run dev');
            $command->comment('NOW you can build someting amazing!!');
        });

        PresetCommand::macro('randyrankin-auth', function ($command) {
            LaravelPreset::installAuth(true);
            $command->info('A custom Laravel preset with Vue, TailwindCSS and Auth scaffolding has been installed!');
            $command->info('To finish setup, run one of the following commands:');
            $command->info('If you are using npm: npm install && ./node_modules/.bin/tailwind init && npm run dev');
            $command->info('If you are using yarn: yarn && ./node_modules/.bin/tailwind init && yarn run dev');
            $command->comment('NOW you can build someting amazing!!');
        });
    }
}