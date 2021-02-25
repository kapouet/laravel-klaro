const mix = require('laravel-mix');

mix
    .babelConfig({
        presets: [
            '@babel/preset-react'
        ]
    })
    .setPublicPath('dist')
    .js('resources/js/app.js', 'js/klaro.js')
    .sass('resources/sass/app.scss', 'css/klaro.css')
    .sourceMaps()
    .preact();

if (mix.inProduction()) {
    mix.version();
}
