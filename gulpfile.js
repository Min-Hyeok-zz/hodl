const gulp = require('gulp')
const sass = require('gulp-sass')
const autoprefixer = require('gulp-autoprefixer')
const livereload = require('gulp-livereload')
const connect = require('gulp-connect')

gulp.task('sass', () => {
    return gulp.src('./scss/*.scss')
    .pipe(sass({outputStyle: 'compact'}).on('error', sass.logError))
    .pipe(autoprefixer({
    	browsers: ['last 2 version'],
    	cascade: false
    }))
    .pipe(gulp.dest('./css'))
})

gulp.task('livereload', () => {
	gulp.src('./scss/*')
	.pipe(connect.reload())
})

gulp.task('sass:watch', () => {
	gulp.watch('./scss/*.scss',['sass'])
	gulp.watch('./scss/*.scss',['livereload'])
})