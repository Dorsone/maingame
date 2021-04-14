var gulp = require('gulp');
const del = require('del');

gulp.task('clean', done => {
    del(['build/*'])
    done();
//     (async () => {
//         const deletedPaths = await del(['build/*']);
     
//         console.log('Deleted files and folders:\n', deletedPaths.join('\n'));
//     })();
});
