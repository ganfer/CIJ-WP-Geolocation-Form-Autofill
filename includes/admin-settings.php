
<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Admin settings page
function gf_autofill_admin_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php echo __('Geolocation Form Autofill Settings', 'geolocation-form-autofill'); ?></h1>
        <p><?php echo __('Configure the settings for the Geolocation Form Autofill plugin.', 'geolocation-form-autofill'); ?></p>
        
        <form method="post" action="options.php">
            <?php
            settings_fields('gf_autofill_options_group');
            do_settings_sections('gf_autofill');
            submit_button(__('Save Changes', 'geolocation-form-autofill'));
            ?>
        </form>
    </div>
    <?php
}

function gf_autofill_register_settings() {
    add_settings_section(
        'gf_autofill_main_section',
        __('Main Settings', 'geolocation-form-autofill'),
        'gf_autofill_main_section_cb',
        'gf_autofill'
    );

    add_settings_field(
        'gf_autofill_enable',
        __('Enable Autofill', 'geolocation-form-autofill'),
        'gf_autofill_enable_cb',
        'gf_autofill',
        'gf_autofill_main_section'
    );

    register_setting('gf_autofill_options_group', 'gf_autofill_enable');
}

function gf_autofill_main_section_cb() {
    echo '<p>' . __('Enable or disable the autofill functionality.', 'geolocation-form-autofill') . '</p>';
}

function gf_autofill_enable_cb() {
    $value = get_option('gf_autofill_enable', '1');
    echo '<input type="checkbox" name="gf_autofill_enable" value="1" ' . checked(1, $value, false) . ' />';
}

add_action('admin_init', 'gf_autofill_register_settings');
