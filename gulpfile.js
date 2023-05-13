const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const terser = require('gulp-terser');
const browsersync = require('browser-sync').create();

//Sass task
function scssTask() {
    return src('src/scss/style.scss', {sourcemaps: true})
        .pipe (sass({outputStyle: 'compressed'}))
        .pipe (postcss([cssnano()]))
        .pipe (dest('dist', {sourcemaps: '.'}));
}

//Javascript task
function jsTask() {
    return src('src/js/*.js', {sourcemaps: true})
        .pipe(terser())
        .pipe(dest('dist/js', {sourcemaps: '.'}));
}

//Browsersync tasks
function browsersyncServe(cb) {
    browsersync.init({
        // server: {
        //     baseDir: '.'
        // }
        proxy: 'localhost',
        port: 8081,
        open: false
    });
    cb();
}

function browsersyncReload(cb) {
    browsersync.reload();
    cb();
}

//Watch task
function watchTask() {
    watch('.php', browsersyncReload);
    watch(['src/scss/.scss', 'src/js/.js'], series(scssTask, jsTask, browsersyncReload));
}

//Default gulp task
exports.default = series(
    scssTask,
    jsTask,
    browsersyncServe,
    watchTask
);