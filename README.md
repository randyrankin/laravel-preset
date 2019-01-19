# My Laravel Frontend Preset

### What are we doing?
- Removing Bootstrap and jQuery
- Installing Tailwind
- Installing PurgeCSS
- Customizing webpack.mix.js with extract() and purgeCss()
- Enhancing .gitignore
- Replacing stock welcome.blade.php with Tailwind friendly version

### Installation:
`composer install randyrankin/laravel-preset`

### Usage:
`php artisan preset randyrankin`

Once finished, run the build:

if you are using npm, run: `npm install && ./node_modules/.bin/tailwind init && npm run dev`

If you are using yarn, run: `yarn && ./node_modules/.bin/tailwind init && yarn run dev`
