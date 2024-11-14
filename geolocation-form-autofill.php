<?php
/**
 * Plugin Name: Customer Insights - Journeys Geolocation Form Autofill
 * Description: Ein Plugin, um Dynamics Customer Insights - Journey Formulare mit Hilfer der Geolocation vorauszufüllen.
 * Version: 1.0
 * Author: Ferdinand Ganter
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Definition von Konstanten
define('GEOLOCATION_FORM_AUTOFILL_PATH', plugin_dir_path(__FILE__));
define('GEOLOCATION_FORM_AUTOFILL_URL', plugin_dir_url(__FILE__));

// Einbindung der erforderlichen Dateien
require_once GEOLOCATION_FORM_AUTOFILL_PATH . 'includes/admin-settings.php';
require_once GEOLOCATION_FORM_AUTOFILL_PATH . 'includes/scripts.php';

// Initialisierung der Hauptklasse
new GeolocationFormAutofillPlugin();

// Einstellungen-Link zum Plugin auf der Plugins-Seite hinzufügen
function gf_autofill_settings_link($links) {
    // URL zur Admin-Einstellungsseite des Plugins
    $settings_link = '<a href="admin.php?page=geolocation-form-autofill">Einstellungen</a>';
    // Link zur Liste der Plugin-Links hinzufügen
    array_unshift($links, $settings_link);
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'gf_autofill_settings_link');
