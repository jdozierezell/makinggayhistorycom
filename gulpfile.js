var gulp = require('gulp');

var paths = {
    cssOutput: './'
};

// production sftp variables

// var buildProd = {
//     host: 'hutz.interdyne.net',
//     port: 22,
//     auth: 'production'
// }
//
// // build the css
//
gulp.task('scss', function() {
  var sourcemaps = require('gulp-sourcemaps');
  return gulp.src('src/scss/style.scss')
             .pipe(sourcemaps.init())
             .pipe(require('gulp-debug')())
             .pipe(require('gulp-sass')({
               errLogToConsole: true
             }))
            .pipe(require('gulp-autoprefixer')({
              browsers: ['last 3 versions']
            }))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest(paths.cssOutput));
});
//
// // begin production tasks
//
// gulp.task('prod:css', ['scss'], function() {
//   return gulp.src(['style.css'])
//              .pipe(require('gulp-sftp')({
//                host: buildProd.host,
//                port: buildProd.port,
//                auth: buildProd.auth,
//                remotePath: 'wp-content/themes/makinggayhistory'
//              }));
// });
//
// gulp.task('prod:root', function() {
//   return gulp.src(['*.php'])
//              .pipe(require('gulp-sftp')({
//                host: buildProd.host,
//                port: buildProd.port,
//                auth: buildProd.auth,
//                remotePath: 'wp-content/themes/makinggayhistory'
//              }));
// });
//
// gulp.task('prod:inc', function() {
//   return gulp.src('inc/*.php')
//              .pipe(require('gulp-sftp')({
//                host: buildProd.host,
//                port: buildProd.port,
//                auth: buildProd.auth,
//                remotePath: 'wp-content/themes/makinggayhistory/inc'
//              }));
// });
//
// gulp.task('prod:js', function() {
//   return gulp.src('js/*.js')
//              .pipe(require('gulp-sftp')({
//                host: buildProd.host,
//                port: buildProd.port,
//                auth: buildProd.auth,
//                remotePath: 'wp-content/themes/makinggayhistory/js'
//              }));
// });
//
// gulp.task('prod:languages', function() {
//   return gulp.src('languages/*.*')
//              .pipe(require('gulp-sftp')({
//                host: buildProd.host,
//                port: buildProd.port,
//                auth: buildProd.auth,
//                remotePath: 'wp-content/themes/makinggayhistory/languages'
//              }));
// });
//
// gulp.task('prod:layouts', function() {
//   return gulp.src('layouts/*.css')
//              .pipe(require('gulp-sftp')({
//                host: buildProd.host,
//                port: buildProd.port,
//                auth: buildProd.auth,
//                remotePath: 'wp-content/themes/makinggayhistory/layouts'
//              }));
// });
//
// gulp.task('prod:page-templates', function() {
//   return gulp.src('page-templates/**/*.php')
//              .pipe(require('gulp-sftp')({
//                host: buildProd.host,
//                port: buildProd.port,
//                auth: buildProd.auth,
//                remotePath: 'wp-content/themes/makinggayhistory/page-templates'
//              }));
// });
//
// gulp.task('prod:template-parts', function() {
//   return gulp.src('template-parts/*.php')
//              .pipe(require('gulp-sftp')({
//                host: buildProd.host,
//                port: buildProd.port,
//                auth: buildProd.auth,
//                remotePath: 'wp-content/themes/makinggayhistory/template-parts'
//              }));
// });
//
// gulp.task('build:prod', ['prod:css', 'prod:root', 'prod:inc', 'prod:js', 'prod:languages', 'prod:layouts', 'prod:page-templates', 'prod:template-parts']);

// watch task for production

gulp.task('watch', ['scss'], function() {

  gulp.watch(['src/**/*.scss'], ['scss']); // when ready for sftp, comment out this line, modify default task, and uncomment below

  // gulp.watch(['src/**/*.scss'], ['prod:css']);
  // gulp.watch(['*.php'], ['prod:root']);
  // gulp.watch(['page-templates/**/*.php'], ['prod:page-templates']);
  // gulp.watch(['template-parts/*.php'], ['prod:template-parts']);
  // gulp.watch(['inc/*.php'], ['prod:inc']);
  // gulp.watch(['js/*.js'], ['prod:js']);
});
