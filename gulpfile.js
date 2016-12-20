var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var basecss = [
    'node_modules/zui/dist/css/zui.min.css',
    'node_modules/font-awesome/css/font-awesome.min.css',
    'node_modules/animate.css/animate.min.css',
    'node_modules/nprogress/nprogress.css'
];

var basejs = [
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/zui/dist/js/zui.min.js',
    'node_modules/nprogress/nprogress.js',
    'node_modules/stickUp/src/stickUp.js'
];

elixir(function(mix) {
    mix
        .copy([
            'node_modules/zui/dist/fonts/zenicon.eot',
            'node_modules/zui/dist/fonts/zenicon.svg',
            'node_modules/zui/dist/fonts/zenicon.ttf',
            'node_modules/zui/dist/fonts/zenicon.woff'
        ], 'public/assets/fonts/')

        .copy([
            'node_modules/font-awesome/fonts/fontawesome-webfont.eot',
            'node_modules/font-awesome/fonts/fontawesome-webfont.svg',
            'node_modules/font-awesome/fonts/fontawesome-webfont.ttf',
            'node_modules/font-awesome/fonts/fontawesome-webfont.woff',
            'node_modules/font-awesome/fonts/fontawesome-webfont.woff2'
        ], 'public/assets/fonts/')

        .styles(
            basecss.concat([
                'resources/assets/css/index_header.css',
                'resources/assets/css/index_navbar.css',
                'resources/assets/css/index_main.css',
                'resources/assets/css/index_boxes.css'
            ]),
            'public/assets/css/index.min.css',
            './'
        )

        .scripts(
            basejs.concat([
                'resources/assets/js/index_navbar.js'
            ]),
            'public/assets/js/index.min.js',
            './'
        )

        .scripts(
            basejs,
            'public/assets/js/admin.script.min.js',
            './'
        );
});
