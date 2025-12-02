"use strict";

const process = require("process");
const paletteGenerator = require("postcss-understrap-palette-generator");
const purgecssPlugin = require("@fullhuman/postcss-purgecss").purgeCSSPlugin;
const cssnano = require("cssnano");

// colors for wordpress editor
const colors = [
  "blue",
  "indigo",
  "purple",
  "pink",
  "red",
  "orange",
  "yellow",
  "green",
  "teal",
  "cyan",
  "white",
  "gray",
  "gray-dark",
  "gray-light",
];

module.exports = (ctx) => {
  const plugins = [
    require("autoprefixer")({
      cascade: false,
      env: "bs5",
    }),
    paletteGenerator({
      colors: colors.map((x) => `--${"bs-"}${x}`),
    }),
    purgecssPlugin({
      content: [
        "./wp-content/themes/cpubchurchv3/**/*.php",
        "./wp-content/themes/cpubchurchv3/src/js/**/*.js",
        "./wp-content/themes/cpubchurchv3/src/sass/**/*.scss",
      ],
      safelist: {
        standard: [
          /^wpcf7/,
          /^wp-block/,
          /^navbar/,
          /^nav-/,
          /^collapse/,
          /^collapsing/,
          /^show$/,
          /^active$/,
          /^disabled$/,
          /^btn/,
          /^form/,
          /^input/,
          /^card/,
          /^table/,
          /^container/,
          /^row$/,
          /^col/,
          /^g-/,
          /^gx-/,
          /^gy-/,
          /^m[tblrxy]?-/,
          /^p[tblrxy]?-/,
          /^text-/,
          /^bg-/,
          /^border/,
          /^d-/,
          /^flex-/,
          /^justify-/,
          /^w-/,
          /^h-/,
        ],
        deep: [/^wpcf7/],
        greedy: [
          /^navbar/,
          /^collapse/,
          /^btn/,
          /^form/,
          /^card/,
          /^table/,
          /^wpcf7/,
        ],
      },
    }),
    cssnano({
      preset: [
        "default",
        {
          discardComments: { removeAll: true },
          normalizeWhitespace: true,
        },
      ],
    }),
  ];

  return {
    map: {
      inline: false,
      annotation: true,
      sourcesContent: true,
    },
    plugins: plugins,
  };
};
