#!/usr/bin/env node
const { execSync } = require("child_process");

const THEME_PATH = "wp-content/themes/cpubchurchv3";
const CSS_PATH = `${THEME_PATH}/css`;
const SASS_PATH = `${THEME_PATH}/src/sass`;
const BUILD_PATH = "build";

const commands = [
  // Compile SASS
  `sass --style expanded --source-map --embed-sources --no-error-css --quiet ${SASS_PATH}/child-theme.scss:${CSS_PATH}/child-theme.css node_modules/understrap/src/sass/custom-editor-style.scss:${CSS_PATH}/custom-editor-style.css`,

  // PostCSS
  `postcss --config ${BUILD_PATH}/postcss.config.js ${CSS_PATH}/child-theme.css ${CSS_PATH}/custom-editor-style.css --dir ${CSS_PATH} --ext .min.css`,
];

console.log("Building CSS...");
commands.forEach((cmd, i) => {
  console.log(`CSS Step ${i + 1}/${commands.length}`);
  execSync(cmd, { stdio: "inherit" });
});
console.log("✓ CSS build complete");
