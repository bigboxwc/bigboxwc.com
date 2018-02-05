<?php
/**
 * WooCommerce integration.
 *
 * @since 1.0.0
 *
 * @package BigBox
 * @category Integration
 * @author Spencer Finnell
 */

namespace BigBox\Website\Integrations;

use BigBox\Website\Integration;
use BigBox\Website\Registerable;
use BigBox\Website\Service;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * WooCommerce.
 *
 * @since 1.0.0
 */
class WooCommerce extends Integration implements Registerable, Service {

	/**
	 * Define the dependencies.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->set_dir( dirname( __FILE__ ) );
	}

	/**
	 * Connect to WordPress.
	 *
	 * @since 1.0.0
	 */
	public function register() {
		add_action( 'after_setup_theme', [ $this, 'add_theme_support' ] );
		add_filter( 'woocommerce_enqueue_styles', [ $this, 'dequeue_styles' ] );
		add_filter( 'woocommerce_template_path', [ $this, 'template_path' ] );
	}

	/**
	 * Add theme support.
	 *
	 * @since 1.0.0
	 */
	public function add_theme_support() {
		add_theme_support( 'woocommerce' );
	}

	/**
	 * Dequeue visual WooCommerce styles.
	 *
	 * @since 1.0.0
	 *
	 * @param array $styles List of stylesheets.
	 * @return array $styles
	 */
	public function dequeue_styles( $styles ) {
		unset( $styles['woocommerce-general'] );
		unset( $styles['woocommerce-smallscreen'] );
		unset( $styles['woocommerce-layout'] );

		return $styles;
	}

	/**
	 * Locate a template in our new location.
	 *
	 * @since 1.0.0
	 *
	 * @param string $path Current template path.
	 * @return array $path
	 */
	public function template_path( $path ) {
		return 'app/integrations/woocommerce/views/';
	}

}
