"use strict";

const path = require("path");
const { babel } = require("@rollup/plugin-babel");
const { nodeResolve } = require("@rollup/plugin-node-resolve");
const commonjs = require("@rollup/plugin-commonjs");
const replace = require("@rollup/plugin-replace");

let bsVersion = 5;
let fileDest = "child-theme";
let globals = {
  jquery: "jQuery",
  "@popperjs/core": "Popper",
};

const external = ["jquery"];

const plugins = [
  babel({
    browserslistEnv: `bs${bsVersion}`,
    babelHelpers: "bundled",
  }),
  replace({
    "process.env.NODE_ENV": '"production"',
    preventAssignment: true,
  }),
  nodeResolve(),
  commonjs(),
];

const THEME_PATH = "wp-content/themes/cpubchurchv3";

module.exports = {
  input: path.resolve(__dirname, `../${THEME_PATH}/src/js/main.js`),
  output: [
    {
      file: path.resolve(__dirname, `../${THEME_PATH}/js/${fileDest}.js`),
      format: "umd",
      globals,
      name: "understrap",
    },
    {
      file: path.resolve(__dirname, `../${THEME_PATH}/js/${fileDest}.min.js`),
      format: "umd",
      globals,
      name: "understrap",
    },
  ],
  external,
  plugins,
};
