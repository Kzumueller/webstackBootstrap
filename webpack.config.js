const Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where all compiled assets will be stored
    .setOutputPath('web/build/')

    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')

    // will create web/build/form.js and web/build/form.css
    .addEntry('form', './assets/js/form/form.js')

    // allows less files to be processed
    .enableLessLoader()
    // writes source maps when not in production
    .enableSourceMaps(!Encore.isProduction())

    // empties the outputPath dir before each build
    .cleanupOutputBeforeBuild();

// export the final configuration
module.exports = Encore.getWebpackConfig();