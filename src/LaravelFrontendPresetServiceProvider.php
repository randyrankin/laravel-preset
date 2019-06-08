<?php

namespace RandyRankin\LaravelFrontendPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class LaravelFrontendPresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        PresetCommand::macro('laravel-preset', function ($command) {
            LaravelFrontendPreset::install();
            $command->info('A custom Laravel frontend preset with Vue and TailwindCSS has been installed!');
            
            if ($command->confirm('Would you like to install the Laravel auth scaffoloding?', false)) {
                LaravelFrontendPreset::installAuth();
                $command->info('The Laravel Auth scaffolding has been installed!');

                if ($command->confirm('Would you like to install the Laravel auth feature tests?', false)) {
                    LaravelFrontendPreset::installAuthTests();
                    $command->info('The Laravel auth feature tests have been installed!');
                }
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
    }
}