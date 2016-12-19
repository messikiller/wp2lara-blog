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
    'node_modules/zui/dist/css/zui.min.css'
];

var basejs = [
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/zui/dist/js/zui.min.js'
];

elixir(function(mix) {
    mix
        .copy([
            'node_modules/zui/dist/fonts'
        ], 'public/assets/fonts/zui')

        .copy([
            'node_modules/font-awesome/fonts'
        ], 'public/assets/fonts/font-awesome')

        .styles(
            basecss.concat([
                'resources/assets/css/index_header.css'
            ]),
            'public/assets/css/index.min.css',
            './'
        )

        .scripts(
            basejs,
            'public/assets/js/admin.script.min.js',
            './'
        );
});
