const gulp = require('gulp');
const scss = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');

gulp.task('scss', () => {
	return gulp.src('scss/init.scss')
		.pipe(scss().on('error', scss.logError))
		.pipe(scss({
			outputStyle: 'compressed'
		}))
		.pipe(autoprefixer({
			browsers: ['last 2 versions']
		}))
		.pipe(gulp.dest('css'));
});

gulp.task('watch', () => {
    gulp.watch('scss/*.scss', ['scss']);
});

gulp.task('default', ['watch', 'scss']);