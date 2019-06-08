# My Laravel Frontend Preset

A Laravel frontend preset that scaffolds out new applications just the way I like 'em'! 👌🏻 

### Before you start, a word of advice
This package should only be used with a **NEW** Laravel project as it will overwrite multiple files. After you run the preset command, it is **highly recommended** that the package be removed by running `composer remove randyrankin/laravel-preset`. 

### What are we doing?
- Remove Bootstrap, JQuery, Lodash and Popper.js
- Install [Tailwind CSS](https://tailwindcss.com) and [Purgecss](https://www.purgecss.com/), via [spatie/laravel-mix-purgecss](https://github.com/spatie/laravel-mix-purgecss)
- Customizing webpack.mix.js with extract() and purgeCss()
- Enhancing .gitignore
- Including a layouts\app.blade.php file
- Replacing views with Tailwind friendly versions

Note: purgeCss() and version() does not run in dev builds (see webpack.mix.js). 

### Installation:
`composer require randyrankin/laravel-preset`

### Usage:
`php artisan preset laravel-preset`

You will be asked if you want to install the Laravel Auth scaffolding
- Answer yes or no (the default is no)


Once finished, run the build:

- If you are using **npm**, run: `npm install && npm run dev`
- If you are using **yarn**, run: `yarn && yarn run dev`

### Auth Feature Tests
If you chose to install the Laravel auth scaffolding, auth feature tests for "out of the box" Laravel auth scoffolding are included. 

## Cleanup
After installing the preset and running the build, the package is not really needed anymore so you may remove it by running `composer remove randyrankin/laravel-preset`.

### Inspiration and Credits:
- [Laracasts: How to Create Custom Laravel Presets](https://laracasts.com/series/how-to-create-custom-presets)
- [Caleb Porzio: Laravel Preset](https://github.com/calebporzio/laravel-frontend-preset)
- [Adam Wathan: Laravel Preset](https://github.com/adamwathan/laravel-preset)

