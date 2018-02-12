<?php
/**
 * Gravity Forms integration.
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
 * GravityForms.
 *
 * @since 1.0.0
 */
class GravityForms extends Integration implements Registerable, Service {

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
		require_once $this->get_dir() . '/template-hooks.php';
		require_once $this->get_dir() . '/template-functions.php';
	}

}
