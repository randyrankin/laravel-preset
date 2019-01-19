# My Laravel Frontend Preset 🚀

A Laravel frontend preset that scaffolds out new applications just the way I like 'em 👌🏻

### What are we doing?
- Remove Bootstrap, JQuery, Lodash and Popper.js
- Install [Tailwind CSS](https://tailwindcss.com) and [Purgecss](https://www.purgecss.com/), via [spatie/laravel-mix-purgecss](https://github.com/spatie/laravel-mix-purgecss)
- Customizing webpack.mix.js with extract() and purgeCss()
- Enhancing .gitignore
- Including a layouts\app.blade.php file
- Replacing welcome.blade.php with a Tailwind friendly version

Note: purgeCss() and version() does not run in dev builds (see webpack.mix.js).

### Installation:
`composer install randyrankin/laravel-preset`

### Usage:
`php artisan preset randyrankin`

Once finished, run the build:

- If you are using **npm**, run: `npm install && ./node_modules/.bin/tailwind init && npm run dev`
- If you are using **yarn**, run: `yarn && ./node_modules/.bin/tailwind init && yarn run dev`


