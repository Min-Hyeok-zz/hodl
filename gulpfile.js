const gulp = require('gulp')
const sass = require('gulp-sass')
const autoprefixer = require('gulp-autoprefixer')

gulp.task('sass', () => {
    return gulp.src('./scss/*.scss')
    .pipe(sass({outputStyle: 'compact'}).on('error', sass.logError))
    .pipe(autoprefixer({
    	browsers: ['last 2 version'],
    	cascade: false
    }))
    .pipe(gulp.dest('./css'))
})

gulp.task('sass:watch', () => {
	gulp.watch('./scss/*.scss',['sass'])
})