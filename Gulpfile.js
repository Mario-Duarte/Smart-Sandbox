// Gulp
const { watch, series, parallel, src, dest } = require('gulp');

//Scripts requires
const uglify = require('gulp-uglify');
const babel = require('gulp-babel');
const stripDebug = require('gulp-strip-debug');

//Styles requires
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const stripCssComments = require('gulp-strip-css-comments');

sass.compiler = require('sass');

//Tools and others requires
const argv = require('minimist')(process.argv.slice(2));
const gulpif = require('gulp-if');
const del = require('del');
const fileSync = require('gulp-file-sync');
const rename = require('gulp-rename');
const log = require('fancy-log');
const c = require('ansi-colors');
const concat = require('gulp-concat');
const inline = require('gulp-inline');

// Setup directories object
const dir = {
	input: 'src/',
	output: 'src/',
	get inputScripts() { return this.input + 'scripts/'; },
	get inputStyles() { return this.input + 'scss/'; },
	get outputScripts() { return this.output + 'js/'; },
	get outputStyles() { return this.output + 'css/'; }
}

// Autoprefixer options
const optAutoprefixer = {
	remove: false,
	cascade: false
}

const inlineOptions = {
		base: dir.input,
		disabledTypes: ['svg', 'img']
}

function clean(cb) {
	// del(dir.js + '*.js', '!' + dir.js + '**/*.js', dir.css + '*.css', '!' +  dir.css + '**/*.css');
	cb();
}

function styles(cb) {
	log(c.magenta('Compiling styles to ' + dir.outputStyles));
	return src(dir.inputStyles + '**/*.scss')
	.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
	.pipe(stripCssComments())
	.pipe(autoprefixer(optAutoprefixer))
	.pipe(dest(dir.outputStyles));
	cb();
}

function scripts(cb) {
	log(c.magenta('Compiling scripts to ' + dir.outputScripts));
	return src( dir.inputScripts + '**/*.js')
	.pipe(babel({
		presets: ['@babel/env']
	}))
	.pipe(uglify())
	.pipe(dest(dir.outputScripts));
	cb();
}

function main(cb) {
	return src(dir.input + '*.php')
	.pipe(inline(inlineOptions))
	.pipe(dest('./'));
	cb();
}

function whatcher(cb){
	log(c.magenta('Whatching for changes on: '), c.blue(dir.input));
	watch([dir.input + '*.php', dir.inputScripts + '**/*.js', dir.inputStyles + '**/*.scss'], { delay: 500 }, series(parallel(styles, scripts), main));
	cb();
}

exports.default = series(clean,parallel(styles,scripts), main);
exports.watch = whatcher;
exports.clean = clean;
