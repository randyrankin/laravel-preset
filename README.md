# My Laravel Frontend Preset

A Laravel frontend preset that scaffolds out new applications just the way I like 'em'! 👌🏻 

### Before you start, a word of advice
This package should only be used with a **NEW** Laravel project as it will overwrite multiple files. After you run the preset command, it is **highly recommended** that the package be removed by running `composer remove randyrankin/laravel-preset`. 

### What are we doing?
- Remove Bootstrap, JQuery, Lodash and Popper.js
- Install [Tailwind CSS 1.0](https://tailwindcss.com) 
- Install [Laravel Mix Purgecss](https://github.com/spatie/laravel-mix-purgecss)
- Customize webpack.mix.js
- Enhance .gitignore
- Replacing all views with Tailwind friendly versions

Note: purgeCss() and version() does not run in dev builds (see webpack.mix.js). 

### Installation:
`composer require randyrankin/laravel-preset`

### Usage:
`php artisan preset laravel-preset`

You will be asked if you want to install the Laravel Auth scaffolding
- Answer yes or no (the default is yes)

You will be asked if you want to install Laravel auth feature tests 
- Answer yes or no (the default is yes)

You will be asked if you want to install and compile assets (npm install && npm run dev)
- Answer yes or no (the default is yes)

You will be asked if you want to remove this preset packag (recommended)
- Answer yes or no (the default is yes)

### Inspiration and Credits:
- [Laracasts: How to Create Custom Laravel Presets](https://laracasts.com/series/how-to-create-custom-presets)
- [Caleb Porzio: Laravel Preset](https://github.com/calebporzio/laravel-frontend-preset)
- [Adam Wathan: Laravel Preset](https://github.com/adamwathan/laravel-preset)

