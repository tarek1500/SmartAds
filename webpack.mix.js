let mix = require('laravel-mix');

mix.browserSync('smartads');

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
  .sass('resources/assets/sass/app.scss', 'public/css/core.css')
  .sass('resources/assets/sass/cpanel.scss', 'public/css/cpanel.css');
// if (mix.config.inProduction) {
//   mix.version();
// }
