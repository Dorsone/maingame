var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var cfg = require('../../package.json').config;

// Static server
gulp.task('watch', function() {
    gulp.watch(cfg.src.sass + '/**/*.scss', gulp.series('sass'));
    gulp.watch(cfg.src.styles + '/**/*.*', gulp.series('vendorStyles'));
    gulp.watch(cfg.src.jsVendor + '/**/*.*', gulp.series('vendorScripts'));
    gulp.watch(cfg.src.jsCustom + '/**/*.*', gulp.series('script'));
    gulp.watch(cfg.src.pages + '/**/*.pug', gulp.series('pug'));
    gulp.watch(cfg.src.images + '/**/*.*', gulp.series('images'));
    gulp.watch(cfg.src.sprite + '/**/*.*', gulp.series('new-sprite'));
    gulp.watch(cfg.src.fonts + '/**/*.*', gulp.series('fonts'));

});
