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
    .js('resources/js/userDelete.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .postCss('resources/css/header.css', 'public/css', [
        //
    ])
    .postCss('resources/css/common/common-form.css', 'public/css/common', [
        //
    ])
    .postCss('resources/css/common/common-complete.css', 'public/css/common', [
        //
    ])
    .postCss('resources/css/book/books-list.css', 'public/css/book', [
        //
    ])
    .postCss('resources/css/book/book-detail.css', 'public/css/book', [
        //
    ])
    .postCss('resources/css/book/search-book.css', 'public/css/book', [
        //
    ])
    .postCss('resources/css/book/edit-book.css', 'public/css/book', [
        //
    ])
    .postCss('resources/css/common/modal.css', 'public/css/common', [
        //
    ])
    .postCss('resources/css/book/sticky-note-modal.css', 'public/css/book', [
        //
    ])
    .postCss('resources/css/user/user-cancell.css', 'public/css/user', [
        //
    ]);
