'use strict';

/**
 * External dependencies
 */
const path = require( 'path' );
const { babel } = require( '@rollup/plugin-babel' );
const { nodeResolve } = require( '@rollup/plugin-node-resolve' );
const commonjs = require( '@rollup/plugin-commonjs' );
const multi = require( '@rollup/plugin-multi-entry' );
const replace = require( '@rollup/plugin-replace' );

// Populate Bootstrap version specific variables.
let bsVersion = 5;
let bsSrcFile = 'bootstrap.js';
let fileDest = 'child-theme';
let globals = {
	jquery: 'jQuery', // Ensure we use jQuery which is always available even in noConflict mode
	'@popperjs/core': 'Popper',
};

const external = [ 'jquery' ];

const plugins = [
	babel( {
		browserslistEnv: `bs${ bsVersion }`,
		// Include the helpers in the bundle, at most one copy of each.
		babelHelpers: 'bundled',
	} ),
	replace( {
		'process.env.NODE_ENV': '"production"',
		preventAssignment: true,
	} ),
	nodeResolve(),
	commonjs(),
	multi(),
];

const THEME_PATH = 'wp-content/themes/cpubchurchv3';

module.exports = {
	input: [
		path.resolve( __dirname, `../${THEME_PATH}/src/js/${ bsSrcFile }` ),
		path.resolve( __dirname, `../${THEME_PATH}/src/js/skip-link-focus-fix.js` ),
		path.resolve( __dirname, `../${THEME_PATH}/src/js/custom-javascript.js` ),
	],
	output: [
		{
			file: path.resolve( __dirname, `../${THEME_PATH}/js/${ fileDest }.js` ),
			format: 'umd',
			globals,
			name: 'understrap',
		},
		{
			file: path.resolve( __dirname, `../${THEME_PATH}/js/${ fileDest }.min.js` ),
			format: 'umd',
			globals,
			name: 'understrap',
		},
	],
	external,
	plugins,
};