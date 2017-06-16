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
  .js('resources/assets/js/admin/ads.js', 'public/js/admin/ads.js')
  .sass('resources/assets/sass/app.scss', 'public/css/core.css')
  .sass('resources/assets/sass/admin/cpanel.scss', 'public/css/admin/cpanel.css')
  .sass('resources/assets/sass/admin/ads.scss', 'public/css/admin/ads.css');
// if (mix.config.inProduction) {
//   mix.version();
// }
