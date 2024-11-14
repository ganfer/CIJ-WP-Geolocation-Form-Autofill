<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class GeolocationFormAutofillPlugin {
    public function __construct() {
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
    }

    // Admin-Menue
    public function add_admin_menu() {
        add_menu_page(
            'Geolocation Form Autofill',
            'Geolocation Autofill',
            'manage_options',
            'geolocation-form-autofill',
            array($this, 'admin_page'),
            'dashicons-location'
        );
    }

    // Settings
    public function register_settings() {
        register_setting('geolocation_form_autofill_settings', 'geolocation_form_autofill_enable');
        register_setting('geolocation_form_autofill_settings', 'geolocation_form_autofill_location');
    }

    // Admin-Page
    public function admin_page() {
        wp_enqueue_style('geolocation_form_autofill_admin_style', GEOLOCATION_FORM_AUTOFILL_URL . 'assets/css/admin-style.css');
        ?>
        <div class="wrap">
            <h1>Dynamics Customer Insights - Journeys Forms Geolocation Form Autofill Plugin</h1>
            <form method="post" action="options.php">
                <?php settings_fields('geolocation_form_autofill_settings'); ?>
                <?php do_settings_sections('geolocation_form_autofill_settings'); ?>
                
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Plugin aktivieren</th>
                        <td>
                            <input type="checkbox" name="geolocation_form_autofill_enable" value="1" <?php checked(1, get_option('geolocation_form_autofill_enable'), true); ?> />
                            <label for="geolocation_form_autofill_enable"></label>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Einbindungsort des Scripts</th>
                        <td>
                            <select name="geolocation_form_autofill_location">
                                <option value="header" <?php selected(get_option('geolocation_form_autofill_location'), 'header'); ?>>Im Header</option>
                                <option value="shortcode" <?php selected(get_option('geolocation_form_autofill_location'), 'shortcode'); ?>>Mit Shortcode</option>
                            </select>
                        </td>
                    </tr>
                </table>

                <?php submit_button(); ?>
            </form>

            <h2>Anleitung</h2>
            <p>Mit diesem Plugin können Sie auf Dynamics Customer Insights - Journeys Formularen automatisch Stadt- und Postleitzahlinformationen in ein Formularfeld eintragen, basierend auf der Geolocation des Benutzers.</p>
            <p>Wenn Sie den Code gezielt auf bestimmten Seiten einsetzen möchten, wählen Sie in der obigen Option „Mit Shortcode gezielt auf Seite“ und verwenden Sie dann den Shortcode <code>[geolocation_form_autofill]</code> auf der gewünschten Seite.</p>
        </div>
        <?php
    }
}
