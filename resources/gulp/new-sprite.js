var gulp = require('gulp');
const svgmin = require('gulp-svgmin');
const svgSprite = require('gulp-svg-sprite');
var cfg = require('../../package.json').config;
const cheerio = require('gulp-cheerio');
const replace = require('gulp-replace');

gulp.task('new-sprite', function() {
    return gulp.src(cfg.src.sprite + '/*.svg')
    .pipe(svgmin({
        js2svg: {
            pretty: true
        }
    }))
    // remove all fill, style and stroke declarations in out shapes
    .pipe(cheerio({
        run: function ($) {
            $('[fill]').removeAttr('fill');
            $('[stroke]').removeAttr('stroke');
            $('[style]').removeAttr('style');
        },
        parserOptions: {xmlMode: true}
    }))
    // cheerio plugin create unnecessary string '&gt;', so replace it.
    .pipe(replace('&gt;', '>'))
    // build svg sprite
    .pipe(svgSprite({
        mode: {
            symbol: {
                // sprite: '../../../../../../../sprite-inline.svg',
                sprite: '../public/build/images/sprite-inline.svg',
                render: {
                    scss: {
                        dest: '../resources/src/styles/custom/sass/_sprite.scss',
                        template: cfg.src.sass + "/_sprite_template.scss"
                    }
                }
            }
        }
    }))
    .pipe(gulp.dest("./"));
});
