var gulp = require('gulp');
var requireDir = require('require-dir');
var dir = requireDir('./');

gulp.task('dev', gulp.series(
    ['clean'],
    ['new-sprite'],
    gulp.parallel(['sass','vendorStyles','vendorScripts','pug','script','fonts']),
    ['images'],
    ['server']
));