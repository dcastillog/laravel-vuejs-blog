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
mix
    // .js('resources/js/app.js', 'public/js')
    // .sass('resources/sass/app.scss', 'public/css'),
    .styles([
        // 'resources/vendor/bootstrap/css/bootstrap.css',
        'resources/css/style.css',
        // 'resources/vendor/aos/css/aos.css',
        // 'resources/vendor/icomoon/style.css',
        // 'resources/vendor/jquery-magnific-popup/css/jquery.magnific-popup.css',
        // 'resources/vendor/jquery-ui/css/jquery-ui.css',
        // 'resources/vendor/mediaelement-and-player/css/mediaelement-and-player.css',
        // 'resources/vendor/owl-carousel/css/owl.carousel.min.css',
    ], 'public/css/app.css')

    // .styles([
        // 'resources/vendor/fontawesome-free/css/all.css',
        // 'resources/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css',
        // 'resources/vendor/datatables-responsive/css/responsive.bootstrap4.min.css',
        // 'resources/vendor/bootstrap-datepicker/css/bootstrap-datepicker.css',
        // 'resources/vendor/adminlte/css/adminlte.css',
    // ], 'public/css/admin.css')

    .js([
        'resources/js/app.js',
        // 'resources/js/main.js'
    ], 'public/js')

    // .scripts([
    //     'resources/js/adminlte.js',
    //     'resources/js/demo.js',
    // ], 'public/js/admin.js')

    // .scripts([
    //     'resources/vendor/jquery/js/jquery.js',
    //     'resources/vendor/bootstrap/js/bootstrap.bundle.min.js',
    //     // 'resources/vendor/aos/js/aos.js',
    //     // 'resources/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
    //     // 'resources/vendor/icomoon/demo-files/demo.js',
    //     // 'resources/vendor/jquery-magnific-popup/js/jquery.magnific-popup.min.js',
    //     // 'resources/vendor/jquery-ui/js/jquery-ui.js',
    //     // 'resources/vendor/mediaelement-and-player/js/mediaelement-and-player.min.js',
    //     // 'resources/vendor/owl-carousel/js/owl.carousel.min.js',
    // ], 'public/js/vendor.js')

    // .scripts([
    //     'resources/vendor/datatables/jquery.dataTables.min.js',
    //     'resources/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js',
    //     'resources/vendor/datatables-responsive/js/dataTables.responsive.min.js',
    //     'resources/vendor/datatables-responsive/js/responsive.bootstrap4.min.js'
    // ], 'public/js/datatables.js')

    // .copy('resources/vendor/fontawesome-free/webfonts', 'public/webfonts')

    // .copy('resources/vendor/icomoon/fonts', 'public/fonts')

    // .copy([
    //     'resources/img',
    //     'resources/vendor/adminlte/img'
    // ], 'public/img')

    // .sass('resources/sass/app.scss', 'public/css')
    
    .version()
;