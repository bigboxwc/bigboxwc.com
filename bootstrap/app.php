<?php
/**
 * Boostrap the application.
 *
 * @since 1.0.0
 *
 * @package BigBox
 * @category Bootstrap
 * @author Spencer Finnell
 */

namespace BigBox\Website;

// Setup the theme.
$theme = array(
	'extras',
	'assets',
	'nav-menus',
	'page-templates',
	'theme-support',
	'widgets',
	'wordpress',
	'comments',
	'template-tags',
);

foreach ( $theme as $file ) {
	require_once get_template_directory() . '/app/theme/' . $file . '.php';
}

// Plugin integrations.
