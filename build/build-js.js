#!/usr/bin/env node
const { execSync } = require("child_process");

const THEME_PATH = "wp-content/themes/cpubchurchv3";
const JS_PATH = `${THEME_PATH}/js`;
const BUILD_PATH = "build";

const commands = [
  // Compile with Rollup
  `rollup --config ${BUILD_PATH}/rollup.config.js --sourcemap`,

  // Minify with Terser
  `terser ${JS_PATH}/child-theme.min.js --config-file ${BUILD_PATH}/terser.config.json --source-map content=${JS_PATH}/child-theme.js.map,url=child-theme.min.js.map,filename=child-theme.min.js --output ${JS_PATH}/child-theme.min.js`,
];

console.log("Building JavaScript...");
commands.forEach((cmd, i) => {
  console.log(`Step ${i + 1}/${commands.length}...`);
  execSync(cmd, { stdio: "inherit" });
});
console.log("✓ JavaScript build complete");
