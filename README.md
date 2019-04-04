# My Laravel Frontend Preset

A Laravel frontend preset that scaffolds out new applications just the way I like 'em'! 👌🏻

### What are we doing?
- Remove Bootstrap, JQuery, Lodash and Popper.js
- Install [Tailwind CSS](https://tailwindcss.com) and [Purgecss](https://www.purgecss.com/), via [spatie/laravel-mix-purgecss](https://github.com/spatie/laravel-mix-purgecss)
- Customizing webpack.mix.js with extract() and purgeCss()
- Enhancing .gitignore
- Including a layouts\app.blade.php file
- Replacing welcome.blade.php with a Tailwind friendly version
- A few custom CSS styles. 

Note: purgeCss() and version() does not run in dev builds (see webpack.mix.js).

### Installation:
`composer require randyrankin/laravel-preset`

### Usage:
`php artisan preset laravel-preset`

You will be asked if you want to install the Laravel Auth scaffolding
- Answer yes or no (the default is no)

Once finished, run the build:

- If you are using **npm**, run: `npm install && ./node_modules/.bin/tailwind init && npm run dev`
- If you are using **yarn**, run: `yarn && ./node_modules/.bin/tailwind init && yarn run dev`

## Cleanup
After installing the preset and running the build, the package is not really needed anymore so you may remove it from composer.json and run `composer update`.

### Inspiration and Credits:
- [Laracasts: How to Create Custom Laravel Presets](https://laracasts.com/series/how-to-create-custom-presets)
- [Caleb Porzio: Laravel Preset](https://github.com/calebporzio/laravel-frontend-preset)
- [Adam Wathan: Laravel Preset](https://github.com/adamwathan/laravel-preset)

