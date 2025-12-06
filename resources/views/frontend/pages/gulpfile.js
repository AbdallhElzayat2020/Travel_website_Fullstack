const project = 'travelwp-html'
const demo_url = '#';
const gulp = require('gulp');
const cheerio = require("cheerio");
const axios = require('axios');
const sizeOf = require('image-size');
const through2 = require('through2');
const exec = require('child_process').exec;

gulp.task('styles', () => {
    return gulp
        .src(['assets/scss/**/*.scss'])
        .pipe(plumber(errorHandler))
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(lineec())
        .pipe(gulp.dest('assets/css'))
});

// Watch sass
// gulp.task( 'watch', gulp.series( 'clearCache', () => {
// 	gulp.watch( [ 'assets/src/scss/**/*.scss' ], gulp.parallel( 'styles' ) );
// } ) );

gulp.task('watch', gulp.series('clearCache', () => {
    gulp.watch(['src/**/*.php', 'libs/**/*.php', 'libs/*.php', 'libs/*.json'], gulp.parallel('processPhpToHtml'));
    gulp.watch(['assets/scss/**/*.scss'], gulp.parallel('styles'));
}));