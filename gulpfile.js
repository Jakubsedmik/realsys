var gulp = require('gulp');
var less = require('gulp-less');
var concat = require('gulp-concat');
//var uglify = require('gulp-uglify');
var minify = require('gulp-minify');
var rename = require('gulp-rename');
var cleanCSS = require('gulp-clean-css');
var del = require('del');
var jsImport = require('gulp-js-import');
var sourcemaps = require('gulp-sourcemaps');
let uglify = require('gulp-uglify-es').default;
var replace = require('gulp-replace');


var lessFiles_backend = "wp-content/themes/realsys/assets/css/css_backend/src/";
var lessDestinationFile_backend = "wp-content/themes/realsys/assets/css/css_backend/dist/";
var jsFiles_backend = "wp-content/themes/realsys/assets/js/js_backend/src/";
var jsDestinationFile_backend = "wp-content/themes/realsys/assets/js/js_backend/dist/";

var lessFiles_frontend = "wp-content/themes/realsys/assets/css/css_frontend/src/";
var lessDestinationFile_frontend = "wp-content/themes/realsys/assets/css/css_frontend/dist/";
var jsFiles_frontend = "wp-content/themes/realsys/assets/js/js_frontend/src/";
var jsDestinationFile_frontend = "wp-content/themes/realsys/assets/js/js_frontend/dist/";

var backend_stylesPaths = [
    lessFiles_backend + 'main.less'
];

var frontend_stylesPaths = [
    lessFiles_frontend + 'main.less'
];



var backend_scriptsPaths = [
    jsFiles_backend + 'jquery-3.4.1.js',
    jsFiles_backend + 'popper.min.js',
    jsFiles_backend + 'bootstrap.js',
    jsFiles_backend + 'mdb.js',
    jsFiles_backend + 'main.js'
];

var frontend_scriptsPaths = [
    jsFiles_frontend + 'jquery-3.4.1.js',
    jsFiles_frontend + 'filepond.js',
    jsFiles_frontend + 'main.js'
];


var frontendLessPath = lessFiles_frontend + "main.less";

/* Not all tasks need to use streams, a gulpfile is just another node program
 * and you can use all packages available on npm, but it must return either a
 * Promise, a Stream or take a callback and call it
 */
function clean() {
    // You can use multiple globbing patterns as you would with `gulp.src`,
    // for example if you are using del 2.0 or above, return its promise
    return del([ 'assets' ]);
}

/*
 * Define our tasks using plain functions
 */
function backend_styles() {
    return gulp.src(backend_stylesPaths)
        .pipe(sourcemaps.init())
        .pipe(less())
        .pipe(cleanCSS())
        // pass in options to the stream
        .pipe(rename({
            basename: 'main',
            suffix: '.min'
        }))
        .pipe(sourcemaps.write("./"))
        .pipe(gulp.dest(lessDestinationFile_backend));
}

function frontend_styles() {
    return gulp.src(frontend_stylesPaths)
        .pipe(sourcemaps.init())
        .pipe(less())
        .pipe(cleanCSS())
        // pass in options to the stream
        .pipe(rename({
            basename: 'main',
            suffix: '.min'
        }))
        .pipe(sourcemaps.write("./"))
        .pipe(gulp.dest(lessDestinationFile_frontend));
}

function backend_scripts() {
    return gulp.src(backend_scriptsPaths, { sourcemaps: true })
        .pipe(uglify())
        .pipe(concat('main.min.js'))
        .pipe(gulp.dest(jsDestinationFile_backend));
}

function frontend_scripts() {
    return gulp.src(frontend_scriptsPaths, { sourcemaps: true })
        .pipe(uglify())
        .pipe(concat('main.min.js'))
        .pipe(gulp.dest(jsDestinationFile_frontend));
}

function watch() {
    gulp.watch(paths.scripts.src, scripts);
    gulp.watch(paths.styles.src, styles);
}

function set_deploy_environment(){


    return gulp.src(frontendLessPath)
        .pipe(sourcemaps.init())
        .pipe(less(
            {
                modifyVars: {
                    '@productionurl': '"http://szukamdom.pl"',
                }
            }
            )
        )
        .pipe(gulp.dest(lessFiles_frontend, {overwrite: true}))
}

function set_dev_environment(){


    return gulp.src(frontendLessPath)
        .pipe(sourcemaps.init())
        .pipe(less(
            {
                modifyVars: {
                    '@productionurl': '"http://dev.szukamdom.pl"',
                }
            }
            )
        )
        .pipe(gulp.dest(lessFiles_frontend, {overwrite: true}))
}

/*
 * Specify if tasks run in series or parallel using `gulp.series` and `gulp.parallel`
 */
var backend_build = gulp.series(clean, gulp.parallel(backend_styles, backend_scripts));
var frontend_build = gulp.series(clean, gulp.parallel(frontend_styles, frontend_scripts));
var build = gulp.series(clean, gulp.parallel(frontend_styles, frontend_scripts, backend_styles, backend_scripts));

/*
 * You can use CommonJS `exports` module notation to declare tasks
 */
exports.deploySettings = set_deploy_environment;
exports.devSettings = set_dev_environment;
exports.clean = clean;
exports.backend_scripts = backend_scripts;
exports.backend_styles = backend_styles
exports.frontend_scripts = frontend_scripts;
exports.frontend_styles = frontend_styles;
exports.build = build;

exports.watch = watch;
/*
 * Define default task that can be called by just running `gulp` from cli
 */
exports.default = build;