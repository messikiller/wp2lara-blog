var elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

var zui_css = 'resources/assets/css/zui.css';

var basecss = [
    zui_css,
    'node_modules/font-awesome/css/font-awesome.min.css',
    'node_modules/ionicons-npm/css/ionicons.min.css',
    'node_modules/animate.css/animate.min.css',
    'node_modules/nprogress/nprogress.css',
    'node_modules/social-share.js/dist/css/share.min.css'
];

var basejs = [
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/jquery-migrate/dist/jquery-migrate.min.js',
    'node_modules/zui/dist/js/zui.min.js',
    'node_modules/nprogress/nprogress.js',
    'node_modules/stickUp/src/stickUp.js',
    'node_modules/jquery-pjax/jquery.pjax.js',
    'node_modules/social-share.js/dist/js/social-share.min.js'
];

var admin_basecss = [
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'node_modules/font-awesome/css/font-awesome.min.css'
];

var admin_basejs = [
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/jquery-migrate/dist/jquery-migrate.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
    'node_modules/jquery.nicescroll/jquery.nicescroll.min.js'
];

var admin_pagecss = [
    zui_css,
    'node_modules/font-awesome/css/font-awesome.min.css',
    'node_modules/zui/dist/lib/chosen/chosen.min.css',
    'node_modules/zui/dist/lib/colorpicker/zui.colorpicker.min.css'
];

var admin_pagejs = [
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/jquery-migrate/dist/jquery-migrate.min.js',
    'node_modules/jquery.nicescroll/jquery.nicescroll.min.js',
    'node_modules/zui/dist/js/zui.min.js',
    'node_modules/zui/dist/lib/chosen/chosen.min.js',
    'node_modules/zui/dist/lib/colorpicker/zui.colorpicker.min.js',
    'node_modules/markdown/lib/markdown.js'
];

elixir(function(mix) {
    mix
        .less('app.less', zui_css)

        .copy([
            'node_modules/zui/dist/fonts/zenicon.eot',
            'node_modules/zui/dist/fonts/zenicon.svg',
            'node_modules/zui/dist/fonts/zenicon.ttf',
            'node_modules/zui/dist/fonts/zenicon.woff'
        ], 'public/assets/fonts/')

        .copy([
            'node_modules/ionicons-npm/fonts/ionicons.eot',
            'node_modules/ionicons-npm/fonts/ionicons.svg',
            'node_modules/ionicons-npm/fonts/ionicons.ttf',
            'node_modules/ionicons-npm/fonts/ionicons.woff'
        ], 'public/assets/fonts/')

        .copy([
            'node_modules/font-awesome/fonts/fontawesome-webfont.eot',
            'node_modules/font-awesome/fonts/fontawesome-webfont.svg',
            'node_modules/font-awesome/fonts/fontawesome-webfont.ttf',
            'node_modules/font-awesome/fonts/fontawesome-webfont.woff',
            'node_modules/font-awesome/fonts/fontawesome-webfont.woff2'
        ], 'public/assets/fonts/')

        .copy([
            'node_modules/social-share.js/dist/fonts/iconfont.eot',
            'node_modules/social-share.js/dist/fonts/iconfont.svg',
            'node_modules/social-share.js/dist/fonts/iconfont.ttf',
            'node_modules/social-share.js/dist/fonts/iconfont.woff'
        ], 'public/assets/fonts/')

        .copy([
            'node_modules/bootstrap/dist/fonts/glyphicons-halflings-regular.eot',
            'node_modules/bootstrap/dist/fonts/glyphicons-halflings-regular.ttf',
            'node_modules/bootstrap/dist/fonts/glyphicons-halflings-regular.woff2',
            'node_modules/bootstrap/dist/fonts/glyphicons-halflings-regular.svg',
            'node_modules/bootstrap/dist/fonts/glyphicons-halflings-regular.woff'
        ], 'public/assets/fonts/')

        .copy('public/assets/fonts/', 'public/build/assets/fonts/')

        .copy('resources/assets/images/', 'public/assets/images/')

        .copy('resources/assets/images/', 'public/build/assets/images/')

        .styles(
            basecss.concat([
                'resources/assets/css/index_header.css',
                'resources/assets/css/index_navbar.css',
                'resources/assets/css/index_main.css',
                'resources/assets/css/index_boxes.css',
                'resources/assets/css/index_sidebar.css',
                'resources/assets/css/index_footer.css',
                'resources/assets/css/index_content.css',
                'resources/assets/css/index_comments.css'
            ]),
            'public/assets/css/index.css',
            './'
        )

        .scripts(
            basejs.concat([
                'resources/assets/js/home_common.js'
            ]),
            'public/assets/js/index.js',
            './'
        )

        .styles(
            admin_basecss.concat([
                'resources/assets/css/admin_frame.css'
            ]),
            'public/assets/css/admin_frame.css',
            './'
        )

        .scripts(
            admin_basejs.concat([
                'resources/assets/js/admin_frame.js'
            ]),
            'public/assets/js/admin_frame.js',
            './'
        )

        .styles(
            admin_pagecss,
            'public/assets/css/admin_base.css',
            './'
        )

        .scripts(
            admin_pagejs.concat([
                'resources/assets/js/admin_common.js'
            ]),
            'public/assets/js/admin_base.js',
            './'
        )

        .version([
            'assets/js/index.js',
            'assets/js/admin_frame.js',
            'assets/js/admin_base.js',
            'assets/css/index.css',
            'assets/css/admin_frame.css',
            'assets/css/admin_base.css'
        ]);
});
