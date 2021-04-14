var gulp = require('gulp');
var cfg = require('../../package.json').config;

gulp.task('vendorScripts', function() {
    return gulp.src(cfg.src.jsVendor + '/*.*')
        .pipe(gulp.dest(cfg.build.js))
});
