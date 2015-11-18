<?php

add_action( 'admin_menu', 'wpce_add_admin_menu' );
add_action( 'admin_init', 'wpce_settings_init' );

function wpce_add_admin_menu(  ) {
    require_once(__DIR__ . '/govright.php');
    add_submenu_page('govright_options', 'Embedded Apps', 'Embedded Apps', 'manage_options', 'wpce_options', 'wpce_options_page');
}


function wpce_settings_init(  ) {

    register_setting( 'wpce_settings_page', 'wpce_app' );

    add_settings_section(
        'wpce_settings_page_section',
        __( 'General settings', 'wpce' ),
        '',
        'wpce_settings_page'
    );

    add_settings_field(
        'wpce_app',
        __( 'Embedded GovRight application' ),
        'wpce_app_render',
        'wpce_settings_page',
        'wpce_settings_page_section'
    );

}


function wpce_app_render()
{
    $app = get_option('wpce_app'); ?>
    <select name="wpce_app" style="width: 300px;">
        <option value="">Select an option</option>
        <option value="rev-tracker" <?php selected($app, 'rev-tracker'); ?>>Revision Tracker</option>
        <option value="legislation-lab" <?php selected($app, 'legislation-lab'); ?>>Legislation Lab</option>
    </select>
    <?php
}


function wpce_options_page() { ?>
    <form action='options.php' method='post'>

        <h2>GovRight Embedded Apps</h2>

        <?php
        settings_fields( 'wpce_settings_page' );
        do_settings_sections( 'wpce_settings_page' );
        submit_button();
        ?>

    </form>
<?php } ?>