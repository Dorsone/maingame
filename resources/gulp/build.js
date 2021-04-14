var gulp = require('gulp');
var requireDir = require('require-dir');
var dir = requireDir('./');

gulp.task('build', gulp.parallel(['sass','pug']));
gulp.task('build', gulp.series(
    ['clean'],
    gulp.parallel(['sass','vendorStyles','vendorScripts','pug','script','new-sprite','fonts']),
    ['images']
));