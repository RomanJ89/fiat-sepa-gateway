const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Internal Compliance Dashboard (Admin UI)
 |--------------------------------------------------------------------------
 |
 | Compiles assets for the restricted banking operations panel.
 | NOTE: This UI is only accessible via the corporate VPN.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .disableNotifications(); // CI/CD Optimization: Disable system notifications
