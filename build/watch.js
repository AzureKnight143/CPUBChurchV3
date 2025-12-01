#!/usr/bin/env node
const { spawn } = require("child_process");
const config = require("./watch.config");

const processes = [];

// Start Browser Sync
console.log("Starting Browser Sync...");
const bs = spawn(
  "browser-sync",
  ["start", "--config", "build/browser-sync.config.js"],
  {
    stdio: "inherit",
    shell: true,
  }
);
processes.push(bs);

// Start each watcher
config.watchers.forEach((watcher) => {
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
