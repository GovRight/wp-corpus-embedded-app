<?php
/*
Plugin Name: GovRight Corpus Embedded App
Plugin URI: https://github.com/GovRight/wp-corpus-embedded-helper
Description: Plugin to help you to embed a GovRight application into your site. Provides easy app setup and automates some things like authentication callback and social sharing.
Version: 1.0.0
Author: GovRight
Author URI: http://govright.org/
License: MIT
*/

require_once(__DIR__ . '/includes/config.php');
require_once(__DIR__ . '/includes/utils.php');
require_once(__DIR__ . '/includes/interceptors/auth.php');
require_once(__DIR__ . '/includes/interceptors/social.php');
require_once(__DIR__ . '/includes/settings.php');
require_once(__DIR__ . '/includes/shortcodes.php');
