<?php

namespace RandyRankin\LaravelFrontendPreset;

use Illuminate\Support\Arr;
use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset;

class LaravelFrontendPreset extends Preset
{
    public static function install()
    {
        static::updatePackages();
        static::updateWebpackDotMix();
        static::updateGitignore();
        static::updateScripts();
        static::updateStyles();
        static::updateViews();
    }

    public static function installAuth()
    {
        static::installAuthScaffolding();
    }

    public static function installAuthTests()
    {
        static::installAuthFeatureTests();
    }

    public static function updatePackageArray($packages)
    {
        return array_merge([
                'laravel-mix' => '^4.0.14',
                'laravel-mix-purgecss' => '^4.1',
                'laravel-mix-tailwind' => '^0.1.0',
                'tailwindcss' => '^1.0',
                'vue' => '^2.5.17',
                'vue-template-compiler' => '^2.6.4',
            ], 
            Arr::except($packages, [
                'bootstrap',
                'bootstrap-sass',
                'jquery',
                'laravel-mix',
                'lodash',
                'popper.js',
                'sass',
                'sass-loader'
            ]
        ));
    }

    public static function updateWebpackDotMix()
    {
        copy(__DIR__ . '/stubs/webpack.mix.js-stub', base_path('webpack.mix.js'));
    }

    protected static function updateGitignore()
    {
        copy(__DIR__ . '/stubs/gitignore-stub', base_path('.gitignore'));
    }

    public static function updateScripts()
    {
        copy(__DIR__.'/stubs/resources/js/app.js', resource_path('js/app.js'));
        copy(__DIR__ . '/stubs/resources/js/bootstrap.js', resource_path('js/bootstrap.js'));
    }

    public static function updateStyles()
    {
        $files = new Filesystem;
        $files->deleteDirectory(resource_path('sass'));
        $files->makeDirectory(resource_path('css', 0755, true));
        copy(__DIR__ . '/stubs/resources/css/app.css', resource_path('css/app.css'));
        copy(__DIR__ . '/stubs/tailwind.config.js-stub', base_path('tailwind.config.js'));
    }

    protected static function updateViews()
    {
        $files = new Filesystem;
        $files->makeDirectory(resource_path('views/layouts', 0755, true));
        copy(__DIR__ . '/stubs/resources/views/layouts/app.blade.php', resource_path('views/layouts/app.blade.php'));
        
        $files->exists($file = resource_path('views/welcome.blade.php')) && $files->delete($file);
        copy(__DIR__ . '/stubs/resources/views/welcome.blade.php', resource_path('views/welcome.blade.php'));
    }

    protected static function installAuthScaffolding()
    {
        $files = new Filesystem;
        
        file_put_contents(app_path('Http/Controllers/HomeController.php'), static::compileControllerStub());
        $files->exists($file = base_path('routes/web.php')) && $files->delete($file);
        copy(__DIR__ . '/stubs/routes/web.php', base_path('routes/web.php'));
        
        $files->deleteDirectory(resource_path('views/layouts'));
        $files->makeDirectory(resource_path('views/layouts', 0755, true));
        copy(__DIR__ . '/stubs/resources/views/layouts/app-auth.blade.php', resource_path('views/layouts/app.blade.php'));
        
        $files->exists($file = resource_path('views/welcome.blade.php')) && $files->delete($file);
        copy(__DIR__ . '/stubs/resources/views/welcome.blade.php', resource_path('views/welcome.blade.php'));
        $files->exists($file = resource_path('views/home.blade.php')) && $files->delete($file);
        copy(__DIR__ . '/stubs/resources/views/home.blade.php', resource_path('views/home.blade.php'));
        $files->copyDirectory(__DIR__ . '/stubs/resources/views/auth', resource_path('views/auth'));
        $files->copyDirectory(__DIR__ . '/stubs/resources/views/partials', resource_path('views/partials'));
    }

    protected static function installAuthFeatureTests()
    {
        $files = new Filesystem;
        $files->exists($file = base_path('phpunit.xml')) && $files->delete($file);
        copy(__DIR__ . '/stubs/phpunit.xml-stub', base_path('phpunit.xml'));
        $files->copyDirectory(__DIR__ . '/stubs/tests/Feature/Auth', base_path('tests/Feature/Auth'));
    }

    protected static function compileControllerStub()
    {
        return str_replace(
            '{{namespace}}',
            Container::getInstance()->getNamespace(),
            file_get_contents(__DIR__.'/stubs/controllers/HomeController.stub')
        );
    }
}