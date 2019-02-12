<?php

namespace RandyRankin\LaravelPreset;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Container\Container;
use Illuminate\Foundation\Console\Presets\Preset as BasePreset;

class Preset extends BasePreset
{
    public static function install()
    {
        static::updatePackages();
        static::updateWebpackDotMix();
        static::gitignore();
        static::updateScripts();
        static::updateStyles();
        static::updateViews();
    }

    public static function installAuth()
    {
        static::install();
        static::scaffoldAuth();
    }

    public static function updatePackageArray($packages)
    {
        return array_merge([
                'laravel-mix-tailwind' => '^0.1.0',
                'laravel-mix-purgecss' => '^4.0.0',
                'tailwindcss' => '>=0.7.2',
            ], 
            Arr::except($packages, [
                'bootstrap',
                'jquery',
                'lodash',
                'popper.js',
            ]
        ));
    }

    public static function updateWebpackDotMix()
    {
        copy(__DIR__ . '/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    protected static function gitignore()
    {
        copy(__DIR__ . '/stubs/gitignore-stub', base_path('.gitignore'));
    }

    public static function updateScripts()
    {
        copy(__DIR__.'/stubs/app.js', resource_path('js/app.js'));
        copy(__DIR__ . '/stubs/bootstrap.js', resource_path('js/bootstrap.js'));
    }

    public static function updateStyles()
    {
        $files = new Filesystem;
        $files->makeDirectory(resource_path('sass/components', 0755, true));
        $files->delete(resource_path('sass/_variables.scss'));
        copy(__DIR__ . '/stubs/app.scss', resource_path('sass/app.scss'));
        copy(__DIR__ . '/stubs/_custom-utilities.scss', resource_path('sass/_custom-utilities.scss'));
        copy(__DIR__ . '/stubs/components/_button.scss', resource_path('sass/components/_button.scss'));
    }

    protected static function updateViews()
    {
        $files = new Filesystem;
        $files->delete(resource_path('views/welcome.blade.php'));
        $files->exists($file = resource_path('views/home.blade.php')) && $files->delete($file);
        $files->copyDirectory(__DIR__ . '/stubs/views', resource_path('views'));
    }

    protected static function scaffoldAuth()
    {
        file_put_contents(app_path('Http/Controllers/HomeController.php'), static::compileControllerStub());
        file_put_contents(
            base_path('routes/web.php'),
            "Auth::routes();\n\nRoute::get('/home', 'HomeController@index')->name('home');\n\n",
            FILE_APPEND
        );

        $files = new Filesystem;
        $files->delete(resource_path('views/home.blade.php'));
        $files->exists($file = resource_path('views/home.blade.php')) && $files->delete($file);
        copy(__DIR__ . '/stubs/views/home.blade.php', resource_path('views/home.blade.php'));
        
        // COPY AUTH DIR $files->copyDirectory(__DIR__ . '/stubs/resources/views', resource_path('views'));
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