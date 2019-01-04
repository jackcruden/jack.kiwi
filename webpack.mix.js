let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');
let glob = require('glob-all');
let PurgecssPlugin = require('purgecss-webpack-plugin');
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;

// Custom PurgeCSS extractor for Tailwind that allows special characters in
// class names.
//
// https://github.com/FullHuman/purgecss#extractor
class TailwindExtractor {
  static extract(content) {
    return content.match(/[A-Za-z0-9-_:\/]+/g) || [];
  }
}

// Analyse JS bundle
// http://localhost:8888/
// mix.webpackConfig({
//     plugins: [
//         new BundleAnalyzerPlugin(),
//     ],
// });

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.js') ],
    });

if (mix.inProduction()) {
    mix.webpackConfig({
        plugins: [
            new PurgecssPlugin({

                // Specify the locations of any files you want to scan for class names.
                paths: glob.sync([
                    path.join(__dirname, "resources/views/**/*.blade.php"),
                    path.join(__dirname, "resources/js/**/*.vue")
                ]),
                extractors: [
                    {
                        extractor: TailwindExtractor,

                        // Specify the file extensions to include when scanning for
                        // class names.
                        extensions: ["html", "js", "php", "vue"]
                    }
                ]
            })
        ]
    });

    mix.version();
}
