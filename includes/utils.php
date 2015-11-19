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
function wpce_get_loader() {
    $loader_url = wpce_config('loader_url');
    if(empty($loader_url)) {
        return '';
    }
    $law_slug = get_option('wpce_law_slug');
    return '<script src="' . $loader_url . '" data-law-slug="' . $law_slug . '"></script>';
}

/**
 * Print app loader
 */
function corpus_app() {
    echo wpce_get_loader();
}
