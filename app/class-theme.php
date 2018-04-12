<?php
/**
 * WordPress theme.
 *
 * @since 1.0.0
 *
 * @package BigBox
 * @category Bootstrap
 * @author Spencer Finnell
 */

namespace BigBox\Website;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Theme class.
 *
 * @since 1.0.0
 */
final class Theme implements Registerable {

	/**
	 * Register the theme with the WordPress system.
	 *
	 * @since 1.0.0
	 *
	 * @throws Exception\InvalidService If a service is not valid.
	 */
	public function register() {
		add_action( 'after_setup_theme', [ $this, 'load_helpers' ], 0 );

		add_action( 'after_setup_theme', function() {
			if ( ! WP_DEBUG && ! ( is_user_logged_in() || current_user_can( 'manage_options' ) ) && $GLOBALS['pagenow'] !== 'wp-login.php' ) {
				bigbox_view( 'layout/page-coming-soon' );
				exit();
			}
		}, 1 );

		add_action( 'after_setup_theme', [ $this, 'register_services' ], 0 );
	}

	/**
	 * Load functional helpers.
	 *
	 * @since 1.0.0
	 */
	public function load_helpers() {
		$helpers = [
			'extras',
			'assets',
			'nav-menus',
			'page-templates',
			'theme-support',
			'widgets',
			'wordpress',
			'comments',
			'template-tags',
		];

		foreach ( $helpers as $file ) {
			require_once get_template_directory() . '/app/theme/' . $file . '.php';
		}
	}

	/**
	 * Register the individual services of this plugin.
	 *
	 * @since 1.0.0
	 *
	 * @throws Exception\InvalidService If a service is not valid.
	 */
	public function register_services() {
		$services = $this->get_services();
		$services = array_map( [ $this, 'instantiate_service' ], $services );

		array_walk(
			$services, function( Service $service ) {
				$service->register();
			}
		);
	}

	/**
	 * Instantiate a single service.
	 *
	 * @since 1.0.0
	 *
	 * @param string $class Service class to instantiate.
	 *
	 * @return Service
	 * @throws Exception\InvalidService If the service is not valid.
	 */
	private function instantiate_service( $class ) {
		if ( ! class_exists( $class ) ) {
			throw Exception\InvalidService::from_service( $class );
		}

		$service = new $class();

		if ( ! $service instanceof Service ) {
			throw Exception\InvalidService::from_service( $service );
		}

		return $service;
	}

	/**
	 * Get the list of services to register.
	 *
	 * @since 1.0.0
	 *
	 * @return array Array of fully qualified class names.
	 */
	private function get_services() {
		return [
			Integrations\EasyDigitalDownloads::class,
			Integrations\GravityForms::class,
		];
	}

}
