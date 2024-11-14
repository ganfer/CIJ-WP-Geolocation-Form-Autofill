<?php
// Register and enqueue scripts based on the selected embed location
function gf_autofill_enqueue_script() {
    if (get_option('gf_autofill_enabled')) {
        $embed_location = get_option('gf_autofill_embed_location');
        if ($embed_location === 'header') {
            wp_enqueue_script('gf_autofill_script', GEOLOCATION_FORM_AUTOFILL_URL . 'js/geolocation.js', array(), '1.0', false);
        }
    }
}
add_action('wp_enqueue_scripts', 'gf_autofill_enqueue_script');

// Shortcode for selective embedding
function gf_autofill_shortcode() {
    if (get_option('gf_autofill_shortcode_enabled')) {
        wp_enqueue_script('gf_autofill_script', GEOLOCATION_FORM_AUTOFILL_URL . 'js/geolocation.js', array(), '1.0', false);
    }
}
add_shortcode('geolocation_form_autofill', 'gf_autofill_shortcode');
?>
