const gulp = require('gulp');
const path = require('path');
const less = require('gulp-less');
const autoprefixer = require('gulp-autoprefixer');
const clean = require('gulp-clean-css');
const uglify = require('gulp-uglify-es').default;
const concat = require('gulp-concat');
const nodepath = 'node_modules/';
const fs = require('fs');

var config = JSON.parse(fs.readFileSync('./config.json')),
    assetsAPPCSS = new Array(),
    assetsAPPJS = new Array();

assetsAPPCSS.push(nodepath + 'bootstrap/dist/css/bootstrap.min.css');
assetsAPPJS.push(nodepath + 'bootstrap/dist/js/bootstrap.bundle.min.js');

if (config.configuracion.assets.fontawesome == 1) {
    assetsAPPCSS.push(nodepath + '@fortawesome/fontawesome-free/css/all.css');
}
if (config.configuracion.revolution == 1) {
    assetsAPPCSS.push('./revolution/css/settings.css');

    assetsAPPJS.push(
        './revolution/js/jquery.themepunch.tools.min.js',
        './revolution/js/jquery.themepunch.revolution.min.js',
        './revolution/js/extensions/revolution.extension.actions.min.js',
        './revolution/js/extensions/revolution.extension.carousel.min.js',
        './revolution/js/extensions/revolution.extension.kenburn.min.js',
        './revolution/js/extensions/revolution.extension.layeranimation.min.js',
        './revolution/js/extensions/revolution.extension.migration.min.js',
        './revolution/js/extensions/revolution.extension.navigation.min.js',
        './revolution/js/extensions/revolution.extension.parallax.min.js',
        './revolution/js/extensions/revolution.extension.slideanims.min.js',
        './revolution/js/extensions/revolution.extension.video.min.js'
    );
}
if (config.configuracion.assets.aos == 1) {
    assetsAPPCSS.push(nodepath + 'aos/dist/aos.css');
    assetsAPPJS.push(nodepath + 'aos/dist/aos.js');
}

if (config.configuracion.assets.animate == 1) {
    assetsAPPCSS.push(nodepath + 'animate.css/animate.min.css');
}

if (config.configuracion.assets.slick == 1) {
    assetsAPPCSS.push(nodepath + 'slick-carousel/slick/slick.css',
        nodepath + 'slick-carousel/slick/slick-theme.css');
    assetsAPPJS.push(nodepath + 'slick-carousel/slick/slick.min.js');
}
if (config.configuracion.assets.matchHeight == 1) {
    assetsAPPJS.push(nodepath + 'jquery-match-height/dist/jquery.matchHeight-min.js');
}

if (config.configuracion.assets.masonry == 1) {
    assetsAPPJS.push(nodepath + 'masonry-layout/dist/masonry.pkgd.min.js');
}
/**
 * Genera el archivo principal de styles a partir de Less
 * File assets/less/*.less
 * Toma todos los .less de la carpeta
 */
gulp.task('styles', function (done) {
    gulp.src('./assets/less/*.less')
        .pipe(less({
            paths: [path.join(__dirname, 'less', 'includes')]
        }))
        .pipe(autoprefixer({
            browsers: ['last 3 versions']
        }))
        .pipe(clean())
        .pipe(gulp.dest('./dist/css'));
    done();
});

/**
 * Genera el archivo principal de scripts a partir de js
 * File assets/js/*.js
 * Toma todos los archivos .js de la carpeta
 */
gulp.task('scripts', function (done) {
    gulp.src('./assets/js/*.js')
        .pipe(concat('bundle.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./dist/js'));
    done();
});

/**
 * Genera archivo app.css de dependencias
 */
gulp.task('compile-css', function (done) {
    gulp.src(assetsAPPCSS)
        .pipe(concat('app.css'))
        .pipe(clean())
        .pipe(gulp.dest('./dist/css/'));
    done();
});

/**
 * Genera archivo app.js de dependencias
 */
gulp.task('compile-js', function (done) {
    gulp.src([
        nodepath + 'jquery/dist/jquery.min.js'
    ])
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./dist/js/'));


    gulp.src(assetsAPPJS)
        .pipe(concat('app.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./dist/js/'));

    if (config.configuracion.revolution == 1) {

        gulp.src([
            './revolution/fonts/revicons/**'])
            .pipe(gulp.dest('dist/fonts/revicons/'));
    }
    done();
});


// Fonts
gulp.task('fonts', function (done) {
    if (config.configuracion.assets.fontawesome == 1) {
        gulp.src([
            nodepath + '/@fortawesome/fontawesome-free/webfonts/**'])
            .pipe(gulp.dest('dist/webfonts/'));
    }
    if (config.configuracion.assets.slick == 1) {
        gulp.src([
            nodepath + 'slick-carousel/slick/fonts/**'])
            .pipe(gulp.dest('dist/css/fonts/'));
        gulp.src([
            nodepath + 'slick-carousel/slick/ajax-loader.gif'])
            .pipe(gulp.dest('dist/css/'));
    }
    done();
});

/**
 * Watchs para archivos principales, no se checan dependencias
 */
gulp.task('watch', function (done) {
    gulp.watch('./assets/less/**.less', gulp.series('styles'));
    gulp.watch('./assets/js/**.js', gulp.series('scripts'));
    done();
});

/**
 * Genera archivos de arranque
 */
gulp.task('default', gulp.parallel('compile-css', 'styles', 'compile-js', 'scripts', 'fonts'));