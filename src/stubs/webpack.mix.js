let mix = require('laravel-mix');
require('laravel-mix-tailwind');
require('laravel-mix-purgecss');

mix
	.js('resources/js/app.js', 'js')
	.extract([
        'vue',
        'axios',
    ])
    .sass('resources/sass/app.scss', 'css')
    .tailwind();

if (mix.inProduction()) {
	mix.purgeCss().version();
}