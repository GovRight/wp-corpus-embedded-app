<?php

add_action( 'admin_menu', 'wpce_add_admin_menu' );
add_action( 'admin_init', 'wpce_settings_init' );

function wpce_add_admin_menu(  ) {
    require_once(__DIR__ . '/govright.php');
    add_submenu_page('govright_options', 'GovRight Embedded App', 'Embedded App', 'manage_options', 'wpce_options', 'wpce_options_page');
}


function wpce_settings_init(  ) {

    register_setting( 'wpce_settings_page', 'wpce_app' );

    add_settings_section(
        'wpce_settings_page_section',
        __( 'General settings', 'wpce' ),
        'wpce_settings_page_section',
        'wpce_settings_page'
    );

    add_settings_field(
        'wpce_app',
        __( 'Embedded application' ),
        'wpce_app_render',
        'wpce_settings_page',
        'wpce_settings_page_section'
    );

    register_setting( 'wpce_settings_page', 'wpce_law_slug' );

    add_settings_section(
        'wpce_settings_shortcode_section',
        __( 'Shortcode settings', 'wpce' ),
        'wpce_settings_shortcode_section',
        'wpce_settings_page'
    );

    add_settings_field(
        'wpce_law_slug',
        __( 'Embedded law slug' ),
        'wpce_law_slug_render',
        'wpce_settings_page',
        'wpce_settings_shortcode_section'
    );
}

function wpce_settings_page_section() {
    echo 'General application settings.';
}

function wpce_app_render()
{
    $app = get_option('wpce_app');
    $apps = wpce_apps(); ?>
    <select name="wpce_app" style="width: 300px;">
        <option value="">Select an app</option>
        <?php foreach($apps as $slug => $name) { ?>
            <option value="<?php echo $slug; ?>" <?php selected($app, $slug); ?>><?php echo $name; ?></option>
        <?php } ?>
    </select>
    <?php
}

function wpce_settings_shortcode_section() {
    echo 'Shortcode: <code>[corpus-app]</code>';
}

function wpce_law_slug_render()
{
    $slug = get_option('wpce_law_slug'); ?>
    <input type="text" name="wpce_law_slug" value="<?php echo $slug; ?>" style="width: 300px;">
    <?php
}


function wpce_options_page() { ?>
    <form action='options.php' method='post'>

        <h2>GovRight Embedded App</h2>

        <?php
        settings_fields( 'wpce_settings_page' );
        do_settings_sections( 'wpce_settings_page' );
        submit_button();
        ?>

    </form>
<?php } ?>