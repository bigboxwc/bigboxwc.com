/**
 * External dependencies
 */
const webpack = require( 'webpack' );
const ExtractTextPlugin = require( 'extract-text-webpack-plugin' ); // CSS loader for styles specific to block editing.

// Configuration for the ExtractTextPlugin.
const extractConfig = {
	use: [
		{ 
			loader: 'raw-loader' 
		},
		{
			loader: 'postcss-loader',
			options: {
				plugins: [
					require('autoprefixer'),
				],
			},
		},
		{
			loader: 'sass-loader',
    },
	],
};

const cssPlugin = new ExtractTextPlugin( {
	filename: './public/css/app.min.css',
} );

module.exports = {
	entry: './resources/assets/js',
	output: {
		filename: 'public/js/app.min.js',
		path: __dirname,
	},
	module: {
		rules: [
			{
				test: /.js$/,
				loader: 'babel-loader',
				exclude: /node_modules/,
			},
			{
				test: /.s?css$/,
				use: cssPlugin.extract( extractConfig ),
			},
		],
	},
	plugins: [
		new webpack.DefinePlugin( {
			'process.env.NODE_ENV': JSON.stringify( process.env.NODE_ENV || 'development' ),
		} ),
		cssPlugin,
	],
};
