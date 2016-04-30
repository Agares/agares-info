'use strict';
var Promise = require('es6-promise').Promise;
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer');

gulp.task('css', function() {
    return gulp.src('./assets/sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(gulp.dest('./public/assets/css/'));
});

gulp.task('watch', ['css'], function () {
    return gulp.watch('./assets/sass/**/*.scss', ['css']);
});