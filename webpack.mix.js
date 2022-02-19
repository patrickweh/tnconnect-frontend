const dotenvExpand = require('dotenv-expand');
dotenvExpand(require('dotenv').config({ path: '../../.env'/*, debug: true*/}));

const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix.js(__dirname + '/Resources/assets/js/app.js', 'js/frontend.js')
    .postCss(__dirname + '/Resources/assets/css/app.css', 'css/frontend.css', [
        require('tailwindcss'),
    ]);
mix.js(__dirname + '/Resources/assets/js/turbolinks.js', 'js/turbolinks.js');

if (mix.inProduction()) {
    mix.version();
}
