<?php

namespace RandyRankin\LaravelFrontendPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;
use Symfony\Component\Process\Process;

class LaravelFrontendPresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        PresetCommand::macro('laravel-preset', function ($command) {
            LaravelFrontendPreset::install();
            $command->info('A custom Laravel frontend preset with Vue and TailwindCSS has been installed!');
            
            if ($command->confirm('Would you like to install the Laravel auth scaffoloding?', true)) {
                LaravelFrontendPreset::installAuth();
                $command->info('The Laravel Auth scaffolding has been installed!');

                if ($command->confirm('Would you like to install the Laravel auth feature tests?', true)) {
                    LaravelFrontendPreset::installAuthTests();
                    $command->info('The Laravel auth feature tests have been installed!');
                }
            }

            if ($command->confirm('Would you like to compile your assets?', true)) {
                $process = (new Process('npm install && npm run dev'))->setTimeout(null);
                $command->comment('Installing and compiling assets ... ');
                $process->run();
                echo $process->getOutput();
            }

            if ($command->confirm('Do you want to remove this preset package (recommended)?', true)) {
                $process = new Process('composer remove randyrankin/laravel-preset');
                $command->comment('Removing the package and updating composer ... ');
                $process->run();
                echo $process->getOutput();
             }

            $command->comment('All done. Now you can build someting amazing!!');
        });
    }
}