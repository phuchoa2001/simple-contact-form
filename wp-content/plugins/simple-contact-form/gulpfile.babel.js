import gulp from "gulp";
import yargs from "yargs";
import gulpSass from "gulp-sass";
import dartSass from "sass";
import cleanCSS from "gulp-clean-css";
import gulpif from "gulp-if";
import sourcemaps from "gulp-sourcemaps";
import webpack from "webpack-stream";
import named from "vinyl-named";
import browserSync from "browser-sync";

const sass = gulpSass(dartSass);
const server = browserSync.create();
const PRODUCTION = yargs.argv.prod;

const paths = {
  styles: {
    src: "src/scss/main.scss",
    dest: "dist/css"
  },
  scripts: {
    src: "src/js/main.js",
    dest: "dist/js"
  }
};

export const styles = () => {
  return gulp
    .src(paths.styles.src)
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on("error", sass.logError))
    .pipe(gulpif(PRODUCTION, cleanCSS({ compatibility: "ie8" })))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(server.stream());
};

export const scripts = () => {
  return gulp
    .src(paths.scripts.src)
    .pipe(named())
    .pipe(
      webpack({
        module: {
          rules: [
            {
              test: /\.js$/,
              use: {
                loader: "babel-loader",
                options: {
                  presets: ["@babel/preset-env"]
                }
              }
            }
          ]
        },
        output: {
          filename: "[name].js"
        },
        externals: {
          jquery: "jQuery"
        },
        devtool: !PRODUCTION ? "inline-source-map" : false,
        mode: PRODUCTION ? 'production' : 'development'
      })
    )
    .pipe(gulp.dest(paths.scripts.dest));
};

export const serve = done => {
  server.init({
    proxy: "http://localhost/your-wordpress-site"
  });
  done();
};

export const reload = done => {
  server.reload();
  done();
};

export const watch = () => {
  gulp.watch("src/scss/**/*.scss", styles);
  gulp.watch("src/js/**/*.js", gulp.series(scripts, reload));
  gulp.watch("**/*.php", reload);
};

export const dev = gulp.series(
  gulp.parallel(styles, scripts),
  serve,
  watch
);

export const build = gulp.series(
  gulp.parallel(styles, scripts)
);

export default dev;