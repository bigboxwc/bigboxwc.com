<?php
/**
 * Easy Digtal Downloads integration.
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
 * EasyDigitalDownloads.
 *
 * @since 1.0.0
 */
class EasyDigitalDownloads extends Integration implements Registerable, Service {

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
		add_filter( 'edd_template_paths', [ $this, 'template_paths' ] );
	}

	/**
	 * Locate a template in our new location.
	 *
	 * @since 1.0.0
	 *
	 * @param array $paths Current template paths.
	 * @return array $paths
	 */
	public function template_paths( $paths ) {
		$paths[0] = $this->get_dir() . '/views/';

		return $paths;
	}

}
