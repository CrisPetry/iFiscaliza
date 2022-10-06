const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
<<<<<<< HEAD
 | for your Laravel applications. By default, we are compiling the CSS
=======
<<<<<<< HEAD
 | for your Laravel application. By default, we are compiling the Sass
=======
 | for your Laravel applications. By default, we are compiling the CSS
>>>>>>> a7bbd61aae715af32e1b24780cbbc4e834d5c1ca
>>>>>>> 4c80a55 (projeto atualizado)
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
<<<<<<< HEAD
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
=======
<<<<<<< HEAD
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
=======
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
>>>>>>> a7bbd61aae715af32e1b24780cbbc4e834d5c1ca
>>>>>>> 4c80a55 (projeto atualizado)
