'use strict';

var folder		= 'theme';

var gulp 		= require('gulp');
var sass 		= require('gulp-sass');
var concat 		= require('gulp-concat');
var concatCss 	= require('gulp-concat-css');
var sourcemaps 	= require('gulp-sourcemaps');
var watch 		= require('gulp-watch');

gulp.task('sass', function () {
	return gulp.src(folder+'/scss/**/*.scss')
			.pipe(sourcemaps.init({largeFile: true}))
			.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
			.pipe(sourcemaps.write('.'))
			.pipe(gulp.dest(folder+'/css/'));
});

gulp.task('watch', function () {
	return gulp.watch(folder+'/scss/**/*.scss', ['sass']);
});

gulp.task('concat', function () {
	return gulp.src(
		[
			folder+'/bower_components/jquery/dist/jquery.min.js',
			folder+'/bower_components/bootstrap/dist/js/bootstrap.min.js'
		])
		.pipe(concat('plugins.js'))
		.pipe(gulp.dest(folder+'/js/plugins/'));
});

gulp.task('concatCss', function () {
	return gulp.src(
		[
			folder+'/bower_components/bootstrap/dist/css/bootstrap.min.css',
			folder+'/bower_components/font-awesome/css/font-awesome.min.css',
			folder+'/bower_components/themify-icons/css/themify-icons.css'
		])
		.pipe(concatCss("plugins/plugins.css"))
		.pipe(gulp.dest(folder+'/css/'));
});
