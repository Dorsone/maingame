var gulp = require('gulp');
const svgmin = require('gulp-svgmin');
const svgSprite = require('gulp-svg-sprite');
var cfg = require('../../package.json').config;

var configSprite = {
    mode: {
        symbol: {
          dimentions: true,
          dest: 'images',
          sprite: '../images/sprite-inline.svg',
          bust: false,
          example: false
        }
      }
  };

gulp.task('sprite', function() {
    return gulp.src(cfg.src.sprite + '/*.svg')
        .pipe(svgmin())
        .pipe(svgSprite(configSprite))
        .pipe(gulp.dest('./build/'));
});
