var gulp = require("gulp");
var plumber = require("gulp-plumber");
var sass = require("gulp-sass");
var babel = require('gulp-babel');
var postcss = require('gulp-postcss');
var rename = require("gulp-rename");
var concat = require("gulp-concat");
var uglify = require("gulp-uglify");
var sourcemaps = require("gulp-sourcemaps");
var browserSync = require("browser-sync").create();
var del = require("del");
var cleanCSS = require("gulp-clean-css");
var autoprefixer = require("autoprefixer");

var cfg = {
  browserSyncOptions: {
    "proxy": "localhost/collegepark/",
    "notify": false,
    "files": ["./css/*.min.css", "./js/*.min.js", "./**/*.php"]
  },
  paths: {
    js: "./js",
    css: "./css",
    fonts: "./fonts",
    sass: "./sass",
    node: "./node_modules",
    dist: "./dist"
  }
}

var paths = cfg.paths;

// Run:
// gulp sass
// Compiles SCSS files in CSS
gulp.task("sass", function () {
  return gulp
    .src(paths.sass + '/*.scss')
    .pipe(
      plumber({
        errorHandler(err) {
          console.log(err);
          this.emit('end');
        },
      })
    )
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(sass({ errLogToConsole: true }))
    .pipe(postcss([autoprefixer()]))
    .pipe(sourcemaps.write(undefined, { sourceRoot: null }))
    .pipe(gulp.dest(paths.css));
});

gulp.task("minifycss", function () {
  return gulp
    .src([
      paths.css + '/custom-editor-style.css',
      paths.css + '/child-theme.css',
    ])
    .pipe(
      sourcemaps.init({
        loadMaps: true,
      })
    )
    .pipe(
      cleanCSS({
        compatibility: '*',
      })
    )
    .pipe(
      plumber({
        errorHandler(err) {
          console.log(err);
          this.emit('end');
        },
      })
    )
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(paths.css));
});

gulp.task("styles", gulp.series("sass", "minifycss"));

/**
 * Watches .scss, .js and image files for changes.
 * On change re-runs corresponding build task.
 * 
 * Run: gulp watch
 */
gulp.task('watch', function () {
  gulp.watch(
    [paths.sass + '/**/*.scss', paths.sass + '/*.scss'],
    gulp.series('styles')
  );
  gulp.watch(
    [
      'js/**/*.js',
      '!js/theme.js',
      '!js/theme.min.js',
    ],
    gulp.series('scripts')
  );
});

// Run:
// gulp browser-sync
// Starts browser-sync task for starting the server.
gulp.task("browser-sync", function () {
  browserSync.init(cfg.browserSyncOptions);
});

// Run:
// gulp watch-bs
// Starts watcher with browser-sync. Browser-sync reloads page automatically on your browser
gulp.task("watch-bs", gulp.parallel("browser-sync", "watch"));

// Run:
// gulp scripts.
// Uglifies and concat all JS files into one
gulp.task('scripts', function () {
  var scripts = [
    `${paths.node}/bootstrap/dist/js/bootstrap.bundle.js`,
    `${paths.node}/undescores-for-npm/js/skip-link-focus-fix.js`
  ];
  gulp
    .src(scripts, { allowEmpty: true })
    .pipe(babel({ presets: ['@babel/preset-env'] }))
    .pipe(concat('child-theme.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(paths.js));

  return gulp
    .src(scripts, { allowEmpty: true })
    .pipe(babel())
    .pipe(concat('child-theme.js'))
    .pipe(gulp.dest(paths.js));
});

// Run:
// gulp copy-assets.
// Copy all needed dependency assets files from node_modules assets to themes /js, /scss and /fonts folder. Run this task after npm install or npm update
gulp.task("copy-assets", function () {
  // Copy all Font Awesome Fonts
  return gulp
    .src(paths.node + '/font-awesome/fonts/**/*.{ttf,woff,woff2,eot,svg}')
    .pipe(gulp.dest(paths.fonts));
});

// Deleting any file inside the /dist folder
gulp.task('clean-dist', function () {
  return del(paths.dist);
});

// Run
// gulp dist
// Copies the files to the /dist folder for distribution as simple theme
gulp.task(
  'dist',
  gulp.series(['clean-dist'], function () {
    return gulp
      .src(
        [
          '**/*',
          '!' + paths.node,
          '!' + paths.node + '/**',
          '!' + paths.dist,
          '!' + paths.dist + '/**',
          '!' + paths.sass,
          '!' + paths.sass + '/**',
          '!+(readme|README).+(txt|md)',
          '!*.+(dist|json|js|lock|xml)',
          '!CHANGELOG.md',
          "!mogive.html"
        ],
        { buffer: true }
      )
      .pipe(gulp.dest(paths.dist));
  })
);
