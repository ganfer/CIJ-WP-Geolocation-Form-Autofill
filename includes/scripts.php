<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class GeolocationFormAutofillScripts {
	public function __construct() {
		if (get_option('geolocation_form_autofill_enable') && get_option('geolocation_form_autofill_location') === 'header') {
			add_action('wp_enqueue_scripts', array($this, 'enqueue_geolocation_script'));
		}

		if (get_option('geolocation_form_autofill_location') !== 'header') {
			add_shortcode('geolocation_form_autofill', array($this, 'shortcode_geolocation_script'));
		}
	}

	public function enqueue_geolocation_script() {
		wp_enqueue_script(
			'geolocation_form_autofill',
			GEOLOCATION_FORM_AUTOFILL_URL . 'assets/js/geolocation-autofill.js',
			array(),
			defined('GEOLOCATION_FORM_AUTOFILL_VERSION') ? GEOLOCATION_FORM_AUTOFILL_VERSION : null,
			false
		);
	}

	public function shortcode_geolocation_script() {
		$this->enqueue_geolocation_script();
		return '';
	}
}

new GeolocationFormAutofillScripts();
?>
