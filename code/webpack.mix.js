const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
   // .less('resources/less/app.less', 'public/css') // bootstrap3.3.7を使用するために追加
   .sass('resources/sass/app.scss', 'public/css') // defaultで入っているbootstrapを使用する時はlessの方をコメントアウトにしてこちらを使用
   .sass('resources/sass/custom.scss', 'public/css');
