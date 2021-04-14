var gulp = require('gulp');
var cfg = require('../../package.json').config;

gulp.task('vendorStyles', function() {
    return gulp.src(cfg.src.styles + '/*.*')
        .pipe(gulp.dest(cfg.build.css))
});
