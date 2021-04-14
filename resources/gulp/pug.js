var gulp = require('gulp');
var pug = require('gulp-pug');
var cfg = require('../../package.json').config;

gulp.task('pug', function buildHTML() {
  return gulp.src([cfg.src.pages + '/*.pug', '!'+cfg.src.pages + '/_*.pug'])
    .pipe(pug({
        pretty:true
    }))
    .pipe(gulp.dest('./public/build'));
});
