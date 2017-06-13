let mix = require('laravel-mix');

// mix.browserSync('smartads');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setResourceRoot('../');
mix.js('resources/assets/js/bootstrap.js', 'public/js/core.js')
  .js('resources/assets/js/app.js', 'public/js/app.js')
  .sass('resources/assets/sass/app.scss', 'public/css/app.css');
// if (mix.config.inProduction) {
//   mix.version();
// }
