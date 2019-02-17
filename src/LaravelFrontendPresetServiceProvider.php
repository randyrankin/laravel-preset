<?php

namespace RandyRankin\LaravelFrontendPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class LaravelFrontendPresetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        PresetCommand::macro('laravel-frontend', function ($command) {
            LaravelFrontendPreset::install();
            $command->info('A custom Laravel frontend preset with Vue and TailwindCSS has been installed!');
            
            if ($command->confirm('Do you wish to install Auth?',false)) {
                LaravelFrontendPreset::installAuth();
                $command->info('Auth scaffolding has been installed!');
            }

            // if ($command->confirm('Do you want to compile your assets?')) {
                // LaravelFrontendPreset::installAuth();
                // $command->info('A custom Laravel frontend preset with Vue, TailwindCSS and Auth scaffolding has been installed!');
            // }

            // if ($command->confirm('Do you want to remove this package from composer.json (you really don't need it any more)?')) {
                // LaravelFrontendPreset::installAuth();
                // $command->info('A custom Laravel frontend preset with Vue, TailwindCSS and Auth scaffolding has been installed!');
            // }

            // $command->info('To finish setup, run one of the following commands:');
            // $command->info('If you are using npm: npm install && ./node_modules/.bin/tailwind init && npm run dev');
            // $command->info('If you are using yarn: yarn && ./node_modules/.bin/tailwind init && yarn run dev');
            $command->comment('NOW you can build someting amazing!!');
        });

        // PresetCommand::macro('laravel-frontend-auth', function ($command) {
        //     LaravelFrontendPreset::installAuth();
        //     $command->info('A custom Laravel frontend preset with Vue, TailwindCSS and Auth scaffolding has been installed!');
        //     $command->info('To finish setup, run one of the following commands:');
        //     $command->info('If you are using npm: npm install && ./node_modules/.bin/tailwind init && npm run dev');
        //     $command->info('If you are using yarn: yarn && ./node_modules/.bin/tailwind init && yarn run dev');
        //     $command->comment('NOW you can build someting amazing!!');
        // });
    }
}