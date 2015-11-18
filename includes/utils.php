<?php

function wpce_config($option) {
    $config = require(__DIR__ . '/config.php');
    $app = get_option('wpce_app');
    if(empty($app)) {
        return null;
    }
    return $config[$app][$option];
}
