const gulp = require("gulp");
const imagemin = require("gulp-imagemin");

var elixir = require("laravel-elixir");
elixir.config.assetsPath = "assets/"; //trailing slash required.
elixir.config.sourcemaps = false;

/*
  gulpfile.js
  ===========
  Rather than manage one giant configuration file responsible
  for creating multiple tasks, each task has been broken out into
  its own file in gulp/tasks. Any files in that directory get
  automatically required below.

  To add a new task, simply add a new task file that directory.
  gulp/tasks/default.js specifies the default set of tasks to run
  when you run `gulp`.
*/

elixir(function(mix) {
  /*mix.browserSync({
    	proxy: 'http://localhost:8888/module/',
    	files: ['style.min.css']
    });*/
  mix.sass("app.scss", "style.min.css");
});

elixir(function(mix) {
  mix.scripts(
    [
      "assets/js/scrollTo.js",
      "assets/js/localScroll.js",
      "assets/js/onScreen.js",
      "assets/js/site.js"
    ],
    "site.min.js"
  );
});

gulp.task("images", function() {
  gulp
    .src("assets/img-src/**")
    .pipe(
      imagemin({
        progressive: true,
        svgoPlugins: [{ removeViewBox: false }]
      }),
      { base: "." }
    )
    .pipe(gulp.dest("assets/img-dist/"));
});
