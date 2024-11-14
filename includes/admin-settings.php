<?php
class GeolocationFormAutofillPlugin {
    public function __construct() {
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
    }

    public function add_admin_menu() {
        add_menu_page(
            __('Geolocation Form Autofill', 'geolocation-form-autofill'),
            __('Geolocation Autofill', 'geolocation-form-autofill'),
            'manage_options',
            'geolocation-form-autofill',
            array($this, 'admin_page'),
            'dashicons-location'
        );
    }

    public function register_settings() {
        register_setting('geolocation_form_autofill', 'gf_autofill_enabled');
        register_setting('geolocation_form_autofill', 'gf_autofill_embed_location');
        register_setting('geolocation_form_autofill', 'gf_autofill_shortcode_enabled');
    }

    public function admin_page() {
        ?>
        <div class="wrap">
            <h1><?php _e('Geolocation Form Autofill Settings', 'geolocation-form-autofill'); ?></h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('geolocation_form_autofill');
                do_settings_sections('geolocation_form_autofill');
                ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><?php _e('Enable Plugin', 'geolocation-form-autofill'); ?></th>
                        <td><input type="checkbox" name="gf_autofill_enabled" value="1" <?php checked(1, get_option('gf_autofill_enabled'), true); ?> /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php _e('Embed Location', 'geolocation-form-autofill'); ?></th>
                        <td>
                            <select name="gf_autofill_embed_location">
                                <option value="header" <?php selected(get_option('gf_autofill_embed_location'), 'header'); ?>><?php _e('Header', 'geolocation-form-autofill'); ?></option>
                                <option value="shortcode" <?php selected(get_option('gf_autofill_embed_location'), 'shortcode'); ?>><?php _e('Shortcode Only', 'geolocation-form-autofill'); ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><?php _e('Enable Shortcode', 'geolocation-form-autofill'); ?></th>
                        <td><input type="checkbox" name="gf_autofill_shortcode_enabled" value="1" <?php checked(1, get_option('gf_autofill_shortcode_enabled'), true); ?> /></td>
                    </tr>
                    <?php if (get_option('gf_autofill_shortcode_enabled')): ?>
                    <tr valign="top">
                        <th scope="row"><?php _e('Shortcode Usage', 'geolocation-form-autofill'); ?></th>
                        <td><code>[geolocation_form_autofill]</code></td>
                    </tr>
                    <?php endif; ?>
                </table>
                <?php submit_button(); ?>
      
