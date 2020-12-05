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
mix.styles(
    [
        "public/vendor/label/assets/vendors/iconfonts/mdi/css/materialdesignicons.css",
        "public/vendor/label/assets/css/shared/style.css",
        "public/vendor/label/assets/css/demo_1/style.css",
    ],
    "public/css/golbal-styles.css"
).version();

mix.styles(
    [
        "public/vendor/label/assets/vendors/css/vendor.addons.css",
    ],
    "public/css/login-styles.css"
).version();

mix.js(
    [
        "public/vendor/label/assets/js/template.js"
    ],
    "public/js/global-scripts.js"
).version();

mix.js(
    [
    "public/vendor/label/assets/js/dashboard.js"
    ],
    "public/js/dashboard-scripts.js"
).version();

mix.js(
    [
    "public/vendor/label/assets/vendors/apexcharts/apexcharts.min.js",
    "public/vendor/label/assets/vendors/chartjs/Chart.min.js",
    "public/vendor/label/assets/js/charts/chartjs.addon.js"
    ],
"public/js/for-charts-scripts.js"
).version();

