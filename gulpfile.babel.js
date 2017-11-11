'use strict';

import gulp from 'gulp';
import stylus from 'gulp-stylus';
import imagemin from 'gulp-imagemin';
import babel from 'gulp-babel';
import sourcemaps from 'gulp-sourcemaps';
import cleanCSS from 'gulp-clean-css';
import uglify from 'gulp-uglify';
import pump from 'pump';

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


gulp.task('compressCss', function () {
  return gulp.src(`${cssPaths.src}**/*.styl`)
    .pipe(sourcemaps.init())
    .pipe(stylus({
      compress: true
    }))
    .pipe(cleanCSS())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(cssPaths.dist));
});

gulp.task('compressJs', function () {
  return gulp.src(`${javascriptPaths.src}**/*.js`)
    .pipe(sourcemaps.init())
    .pipe(babel({
      presets: ['es2015']
    }))
    .pipe(uglify())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(javascriptPaths.dist));
});

gulp.task('compressImg', function () {
  return gulp.src(`${imagePaths.src}**/*.{png,gif,jpg,svg}`)
  .pipe(imagemin({
    interlaced: true,
    progressive: true,
    optimizationLevel: 5,
    svgoPlugins: [{removeViewBox: true}]
  }))
  .pipe(gulp.dest(imagePaths.dist))
});