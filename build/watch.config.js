module.exports = {
  theme: "wp-content/themes/cpubchurchv3",

  watchers: [
    {
      name: "CSS",
      watch: "wp-content/themes/cpubchurchv3/src/sass/",
      ext: "scss",
      exec: "npm run css",
    },
    {
      name: "JS",
      watch: "wp-content/themes/cpubchurchv3/src/js/",
      ext: "js",
      exec: "npm run js",
    },
  ],
};
