const mix = require('laravel-mix');
const webpack = require('webpack');
var path = require('path');

mix.webpackConfig({
    plugins: [
        new webpack.DefinePlugin({
            __VUE_OPTIONS_API__: true,
            // __VUE_PROD_DEVTOOLS__: true
        })
    ]
});

mix.alias({
    '@': path.join(__dirname, 'resources/js'),
    '~': path.join(__dirname, 'resources/css'),
    '@views': path.join(__dirname, 'resources/vue'),
    '@comp': path.join(__dirname, 'resources/vue/components')
});

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
    .vue()
    .copyDirectory('resources/images', 'public/images')
    .sass('resources/css/app.scss', 'public/css')
    // .postCss('resources/styles/app.css', 'public/css', [
    //     //
    // ])
    .sourceMaps();
