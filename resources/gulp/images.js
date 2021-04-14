var gulp = require('gulp');
var cfg = require('../../package.json').config;

gulp.task('images', function() {
    return gulp.src(cfg.src.images + '/**/*.*')
        .pipe(gulp.dest(cfg.build.images))
});
