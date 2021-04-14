var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var cfg = require('../../package.json').config;
var cleanCSS = require('gulp-clean-css');
var sourcemaps = require('gulp-sourcemaps');
sass.compiler = require('node-sass');

gulp.task('sass', function () {
    return gulp.src(cfg.src.sass + '/style.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            // browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(cleanCSS({
            debug: true,
            level:2
          }, (details) => {
          console.log(`${details.name}: ${details.stats.originalSize}`);
          console.log(`${details.name}: ${details.stats.minifiedSize}`);
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(cfg.build.css));
});

// gulp.task('sass:watch', function () {
//   gulp.watch(cfg.src.sass + '/**/*.scss', gulp.series('sass'));
// });

