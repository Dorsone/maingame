var gulp = require('gulp');
var cfg = require('../../package.json').config;

gulp.task('fonts', function() {
    return gulp.src('./src/fonts/*.*')
        .pipe(gulp.dest(cfg.build.fonts))
});
