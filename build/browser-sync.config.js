module.exports = {
  proxy: "localhost:8000",
  notify: false,
  files: [
    "wp-content/themes/cpubchurchv3/css/*.min.css",
    "wp-content/themes/cpubchurchv3/js/*.min.js",
    "wp-content/themes/cpubchurchv3/**/*.php"
  ],
};
