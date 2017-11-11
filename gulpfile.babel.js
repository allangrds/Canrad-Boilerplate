'use strict';

import gulp from 'gulp';
import stylus from 'gulp-stylus';
import imagemin from 'gulp-imagemin';
import babel from 'gulp-babel';
import sourcemaps from 'gulp-sourcemaps';
import cleanCSS from 'gulp-clean-css';
import uglify from 'gulp-uglify';
import autoprefixer from 'autoprefixer-stylus';
import rev from 'gulp-rev';
import inject from 'gulp-inject';
import concat from 'gulp-concat';

const dirs = {
  src: 'src',
  dist: 'dist'
};

const cssPaths = {
  src: `${dirs.src}/stylus/`,
  dist: `${dirs.dist}/css/`
};

const imagePaths = {
  src: `${dirs.src}/img/`,
  dist: `${dirs.dist}/img/`
};

const javascriptPaths = {
  src: `${dirs.src}/js/`,
  dist: `${dirs.dist}/js/`
};

const htmlTarget = gulp.src('./views/template.php');
const cssTarget = gulp.src(`${cssPaths.dist}**/*.css`, {read: false});
const jsTarget= gulp.src(`${javascriptPaths.dist}**/*.js`, {read: false});

gulp.task('compressCss', function () {
  gulp.src(`${cssPaths.src}**/*.styl`)
    .pipe(sourcemaps.init())
    .pipe(
      stylus({
        compress: true,
        use: autoprefixer()
      })
    )
    .pipe(cleanCSS())
    .pipe(sourcemaps.write())
    .pipe(concat('style.css'))
    .pipe(rev())
    .pipe(gulp.dest(cssPaths.dist));

  return gulp.start('injectCss');
});

gulp.task('injectCss', function () {
  return htmlTarget
    .pipe(inject(cssTarget))
    .pipe(gulp.dest('./views'));
});

gulp.task('compressJs', function () {
  gulp.src(`${javascriptPaths.src}**/*.js`)
    .pipe(sourcemaps.init())
    .pipe(babel({
      presets: ['es2015']
    }))
    .pipe(uglify())
    .pipe(sourcemaps.write())
    .pipe(rev())
    .pipe(gulp.dest(javascriptPaths.dist));

  return gulp.start('injectJs');
});

gulp.task('injectJs', function () {
  return htmlTarget
  .pipe(inject(jsTarget))
  .pipe(gulp.dest('./views'));
});

gulp.task('compressImg', function () {
  return gulp.src(`${imagePaths.src}**/*.{png,gif,jpg,svg}`)
  .pipe(imagemin({
    interlaced: true,
    progressive: true,
    optimizationLevel: 5,
    svgoPlugins: [{removeViewBox: true}]
  }))
  .pipe(gulp.dest(imagePaths.dist));
});

gulp.task('watch', function() {
  gulp.watch(`${cssPaths.src}**/*.styl`, ['compressCss']);
  gulp.watch(`${javascriptPaths.src}**/*.js`, ['compressJs']);
  gulp.watch(`${imagePaths.src}**/*.{png,gif,jpg,svg}`, ['compressImg']);
});

gulp.task('default', ['compressImg', 'compressCss', 'compressJs', 'watch']);