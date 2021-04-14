var gulp = require('gulp');
var uglify = require('gulp-uglify');
var babel = require('gulp-babel');
var cfg = require('../../package.json').config;

gulp.task('script', function() {
    return gulp.src(cfg.src.jsCustom + '/*.*')
        // .pipe(uglify({
        //     toplevel:true
        // }))
        // .pipe(babel({
        //     presets: ['@babel/env']
        // }))
        .pipe(gulp.dest(cfg.build.js))
});
