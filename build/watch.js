#!/usr/bin/env node
const { spawn } = require("child_process");

const THEME_PATH = "wp-content/themes/cpubchurchv3";

const watchers = [
  {
    name: "CSS",
    watch: `${THEME_PATH}/src/sass/`,
    ext: "scss",
    exec: "npm run css",
  },
  {
    name: "JS",
    watch: `${THEME_PATH}/src/js/`,
    ext: "js",
    exec: "npm run js",
  },
];

const processes = [];

// Start Browser Sync
console.log("Starting Browser Sync...");
const bs = spawn(
  "browser-sync",
  [
    "start",
    "--proxy", "localhost:8000",
    "--no-notify",
    "--files", `${THEME_PATH}/css/*.min.css`,
    "--files", `${THEME_PATH}/js/*.min.js`,
    "--files", `${THEME_PATH}/**/*.php`,
  ],
  {
    stdio: "inherit",
    shell: true,
  }
);
processes.push(bs);

// Start each watcher
watchers.forEach((watcher) => {
  console.log(`Starting ${watcher.name} watcher...`);
  const nodemon = spawn(
    "nodemon",
    ["--watch", watcher.watch, "--ext", watcher.ext, "--exec", watcher.exec],
    {
      stdio: "inherit",
      shell: true,
    }
  );
  processes.push(nodemon);
});

// Handle cleanup on exit
process.on("SIGINT", () => {
  console.log("\nStopping watchers...");
  processes.forEach((p) => p.kill());
  process.exit();
});
