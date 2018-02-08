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

		remove_action( 'edd_purchase_form_after_user_info', 'edd_user_info_fields' );
		remove_action( 'edd_register_fields_before', 'edd_user_info_fields' );
		remove_action( 'edd_after_cc_fields', 'edd_default_cc_address_fields' );
		remove_action( 'edd_purchase_form_before_submit', 'edd_checkout_final_total', 999 );
		remove_action( 'edd_purchase_form_register_fields', 'edd_get_register_fields' );

		remove_action( 'edd_stripe_cc_form', 'edds_credit_card_form' );
		add_action( 'edd_stripe_cc_form', function() {
			edd_get_template_part( 'checkout/credit-card-form' );
		} );

		remove_action( 'edd_purchase_form_after_cc_form', 'edd_checkout_submit', 9999 );

		add_filter( 'edd_global_checkout_script_vars', function( $args ) {
			$args['checkout_error_anchor'] = '#checkout-errors';

			return $args;
		} );
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
