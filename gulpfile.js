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


var lessFiles_backend = "wp-content/themes/realsys/assets/css/css_backend/src/";
var lessDestinationFile_backend = "wp-content/themes/realsys/assets/css/css_backend/dist/";
var jsFiles_backend = "wp-content/themes/realsys/assets/js/js_backend/src/";
var jsDestinationFile_backend = "wp-content/themes/realsys/assets/js/js_backend/dist/";

var stylesPaths = [
    lessFiles_backend + 'main.less'
];

var scriptsPaths = [
    jsFiles_backend + 'jquery-3.4.1.js',
    jsFiles_backend + 'popper.min.js',
    jsFiles_backend + 'bootstrap.js',
    jsFiles_backend + 'mdb.js',
    jsFiles_backend + 'main.js'

];

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
function styles() {
    return gulp.src(stylesPaths)
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

function scripts() {
    return gulp.src(scriptsPaths, { sourcemaps: true })
        .pipe(uglify())
        .pipe(concat('main.min.js'))
        .pipe(gulp.dest(jsDestinationFile_backend));
}

function watch() {
    gulp.watch(paths.scripts.src, scripts);
    gulp.watch(paths.styles.src, styles);
}

/*
 * Specify if tasks run in series or parallel using `gulp.series` and `gulp.parallel`
 */
var build = gulp.series(clean, gulp.parallel(styles, scripts));

/*
 * You can use CommonJS `exports` module notation to declare tasks
 */
exports.clean = clean;
exports.styles = styles;
exports.scripts = scripts;
exports.watch = watch;
exports.build = build;
/*
 * Define default task that can be called by just running `gulp` from cli
 */
exports.default = build;