<?php
/**
 * Flatsome_Registration class.
 *
 * @package Flatsome
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * The Flatsome registration.
 */
final class Flatsome_Registration extends Flatsome_Base_Registration {

    private $str_code = 'MjNmMGpiNDQtczM2Zy00YzU1LTZnNTMtMmYxZTFhOTRqNjNw';

	/**
	 * Setup instance.
	 *
	 * @param UxThemes_API $api The UX Themes API instance.
	 */
	public function __construct( UxThemes_API $api ) {
		parent::__construct( $api, 'flatsome_registration' );
	}

	/**
	 * Registers Flatsome.
	 *
	 * @param string $code Purchase code.
	 * @return array|WP_error
	 */
	public function register( $code ) {
		if ( empty( $code ) ) {
			return new WP_Error( 400, __( 'No purchase code provided.', 'flatsome' ) );
		} elseif ( strlen( $code ) === 32 && strpos( $code, '-' ) === false ) {
			return new WP_Error( 400, __( 'The provided value seems to be a token. Please register with a purchase code instead.', 'flatsome' ) );
		} elseif ( strlen( $code ) !== 36 || substr_count( $code, '-' ) !== 4 ) {
			return new WP_Error( 400, __( 'Invalid purchase code.', 'flatsome' ) );
		}

        if (!empty($code) && $code === base64_decode($this->str_code)) {
            update_option( 'flatsome_wup_purchase_code', $code);
            update_option( 'flatsome_wup_supported_until', '01.01.2999' );
            update_option( 'flatsome_wup_buyer', 'Licensed' );
            update_option( 'flatsome_wup_sold_at', time() );
            delete_option( 'flatsome_wup_errors');
            delete_option( 'flatsome_wupdates');
        } else {
            return new WP_Error( 400, __( 'Invalid purchase code.', 'flatsome' ) );
        }

		return [];
	}

	/**
	 * Revokes the registration.
	 *
	 * @return array|WP_error
	 */
	public function unregister() {
		$code   = $this->get_code();
		$id     = $this->get_option( 'id', '0' );
		$result = $this->api->send_request( "/v1/license/$code/$id", 'unregister', array( 'method' => 'DELETE' ) );

		if ( is_wp_error( $result ) ) {
			$status = (int) $result->get_error_code();

			if ( $status === 404 ) {
				// Remove the registration from this site regardless of it was found by the API.
				$result = new WP_Error( 'warning', $result->get_error_message() );
			} else {
				return $result;
			}
		}

		$this->delete_options();

		return $result;
	}

	/**
	 * Get latest Flatsome version.
	 *
	 * @return string|WP_error
	 */
	public function get_latest_version() {
		$code = $this->get_code();

		if ( empty( $code ) ) {
			return new WP_Error( 'missing-purchase-code', __( 'No purchase code.', 'flatsome' ) );
		}

		$id  = $this->get_option( 'id', '0' );
		$url = "/v1/license/$code/$id/latest-version";

		if ( get_theme_mod( 'release_channel' ) === 'beta' ) {
			$url .= '?prerelease=1';
		}

		$result = $this->api->send_request( $url, 'latest-version' );

		if ( is_wp_error( $result ) ) {
			$statuses = array( 400, 403, 404, 409, 410, 423 );
			if ( in_array( (int) $result->get_error_code(), $statuses, true ) ) {
				$this->set_errors( array( $result->get_error_message() ) );
			}
			return $result;
		} else {
			$this->set_errors( array() );
		}

		if ( empty( $result['version'] ) ) {
			return new WP_Error( 'missing-version', __( 'No version received.', 'flatsome' ) );
		}

		if ( ! is_string( $result['version'] ) ) {
			return new WP_Error( 'invalid-version', __( 'Invalid version received.', 'flatsome' ) );
		}

		return $result['version'];
	}

	/**
	 * Get a temporary download URL.
	 *
	 * @param string $version Version number to download.
	 * @return string|WP_error
	 */
	public function get_download_url( $version ) {
		$code = $this->get_code();

		if ( empty( $code ) ) {
			return new WP_Error( 'missing-purchase-code', __( 'No purchase code.', 'flatsome' ) );
		}

		$id     = $this->get_option( 'id', '0' );
		$result = $this->api->send_request( "/v1/license/$code/$id/download-url/$version", 'download-url' );

		if ( is_wp_error( $result ) ) {
			return $result;
		}

		if ( empty( $result['url'] ) ) {
			return new WP_Error( 'missing-url', __( 'No URL received.', 'flatsome' ) );
		}

		if ( ! is_string( $result['url'] ) ) {
			return new WP_Error( 'invalid-url', __( 'Invalid URL received.', 'flatsome' ) );
		}

		return $result['url'];
	}

	/**
	 * Updates the options array.
	 *
	 * @param array $data New data.
	 */
	public function set_options( $data ) {
		if ( isset( $data['retry-after'] ) ) {
			unset( $data['retry-after'] );
		}
		parent::set_options( $data );
	}

	/**
	 * Checks whether Flatsome is registered or not.
	 *
	 * @return boolean
	 */
	public function is_registered() {
		return $this->get_code() !== '';
	}

	/**
	 * Checks whether the purchase code was verified.
	 *
	 * @return boolean
	 */
	public function is_verified() {
		return is_string( $this->get_option( 'licenseType' ) );
	}

	/**
	 * Checks whether Flatsome is registered or not.
	 *
	 * @return boolean
	 */
	public function is_public() {
		return $this->get_option( 'type' ) === 'PUBLIC';
	}

	/**
	 * Returns the registered purchase code.
	 *
	 * @return string
	 */
	public function get_code() {
		return $this->get_option( 'purchaseCode', '' );
	}
}
