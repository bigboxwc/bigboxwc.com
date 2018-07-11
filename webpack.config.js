/**
 * External dependencies
 */
const webpack = require( 'webpack' );
const ExtractTextPlugin = require( 'extract-text-webpack-plugin' ); // CSS loader for styles specific to block editing.
const SpritePlugin = require( 'svg-sprite-loader/plugin' );

// Configuration for the ExtractTextPlugin.
const extractConfig = {
	use: [
		{ 
			loader: 'raw-loader', 
		},
		{
			loader: 'postcss-loader',
			options: {
				plugins: [
					require( 'autoprefixer' ),
				],
			},
		},
		{
			loader: 'sass-loader',
			query: {
				outputStyle: 'production' === process.env.NODE_ENV ? 'compressed' : 'nested',
			},
		},
	],
};

const cssPlugin = new ExtractTextPlugin( {
	filename: './public/css/app.min.css',
} );

const cssHelpscoutPlugin = new ExtractTextPlugin( {
	filename: './public/css/helpscout.min.css',
} );

const config = {
	mode: process.env.NODE_ENV === 'production' ? 'production' : 'development',
	entry: {
		app: './resources/assets/js/app.js',
		support: './resources/assets/js/support.js',
	},
	output: {
		filename: 'public/js/[name].min.js',
		path: __dirname,
	},
	module: {
		rules: [
			{
				test: /\.svg$/,
				use: [
					{
						loader: 'svg-sprite-loader',
						options: {
							extract: true,
							spriteFilename: './public/images/sprite.svg',
						},
					},
					'svgo-loader',
				],
				include: /images/,
				exclude: /demos/,
			},
			{
				test: /\.(png|jp(e*)g|svg)$/,
				use: [
					{
						loader: 'file-loader',
						options: {
							limit: 8000, // Convert images < 8kb to base64 strings
							name: '[name].[ext]',
							useRelativePath: true,
							outputPath: './public/',
						},
					},
				],
				include: /demos/,
			},
			{
				test: /.js$/,
				loader: 'babel-loader',
				exclude: /node_modules/,
				include: /js/,
			},
			{
				test: /style.scss$/,
				use: cssPlugin.extract( extractConfig ),
				include: /scss/,
			},
			{
				test: /helpscout.scss$/,
				use: cssHelpscoutPlugin.extract( extractConfig ),
				include: /scss/,
			},
		],
	},
	externals: {
		jquery: 'jQuery',
		$: 'jQuery',
	},
	plugins: [
		cssPlugin,
		cssHelpscoutPlugin,
		new SpritePlugin(),
		new webpack.ProvidePlugin( {
			$: 'jquery',
			jQuery: 'jquery',
			'window.jQuery': 'jquery',
			Popper: [ 'popper.js', 'default' ],
			Util: "exports-loader?Util!bootstrap/js/dist/util",
		} ),
	],
};

if ( config.mode !== 'production' ) {
	config.devtool = process.env.SOURCEMAP || 'source-map';
}

module.exports = config;
