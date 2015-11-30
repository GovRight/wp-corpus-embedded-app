<?php

/**
 * Get an app-specific config value
 */
function wpce_config($option) {
    $config = require(__DIR__ . '/config.php');
    $app = get_option('wpce_app');
    if(empty($app)) {
        return null;
    }
    return $config[$app][$option];
}

/**
 * Get list of available apps
 */
function wpce_apps() {
    $config = require(__DIR__ . '/config.php');
    $apps = array();
    foreach ($config as $slug => $data) {
        $apps[$slug] = $data['name'];
    }
    return $apps;
}

/**
 * Get app loader html
 */
function wpce_get_loader($atts = array()) {
    $loader_url = wpce_config('loader_url');
    if(empty($loader_url)) {
        $app_name = wpce_config('name');
        if(empty($app_name)) {
            $message = 'GovRight embedded app is not selected. Select an application in the plugin settings.';
        } else {
            $message = 'Can\'t load the ' . $app_name . ' application, missing loader url.';
        }
        return '<script>console.warn("' . $message . '");</script>';
    }
    $law_slug = get_option('wpce_law_slug');
    if(!is_array($atts)) {
        $atts = array();
    }
    if(!isset($atts['data-law-slug'])) {
        $atts['data-law-slug'] = $law_slug;
    }

    return '<script src="' . $loader_url . '" ' . wpce_atts_string($atts) . '></script>';
}

/**
 * Convert shortcode attributes array to string
 */
function wpce_atts_string($atts) {
    if(empty($atts)) {
        return '';
    }
    $string = '';
    foreach ($atts as $key => $val) {
        $string .= $key . '="' . $val . '" ';
    }
    return $string;
}

/**
 * Print app loader
 */
function corpus_app($atts = array()) {
    echo wpce_get_loader($atts);
}
