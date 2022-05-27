const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .autoload({
        "jquery": ['$', 'window.jQuery'],
    })
    .js('resources/js/bookSearch.js', 'public/js')
    .js('resources/js/bookList.js', 'public/js')
    .js('resources/js/bookDetail.js', 'public/js')
    .js('resources/js/login.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .postCss('resources/css/commonForm.css', 'public/css', [
        //
    ])
    .postCss('resources/css/commonCompletePage.css', 'public/css', [
        //
    ])
    .postCss('resources/css/booksList.css', 'public/css', [
        //
    ])
    .postCss('resources/css/bookDetail.css', 'public/css', [
        //
    ])
    .postCss('resources/css/bookSearch.css', 'public/css', [
        //
    ])
    .postCss('resources/css/modal.css', 'public/css', [
        //
    ])
    .postCss('resources/css/sticky-note-modal.css', 'public/css', [
        //
    ]);
