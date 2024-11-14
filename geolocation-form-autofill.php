<?php
/**
 * Plugin Name: Geolocation Form Autofill
 * Description: Ein Plugin, um das Geolocation-Formular-Autofill JavaScript auf der Webseite zu veröffentlichen.
 * Version: 1.0
 * Author: Dein Name
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
