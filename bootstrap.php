<?php
/*
Plugin Name: GovRight Corpus Embedded App
Plugin URI: https://github.com/GovRight/wp-corpus-embedded-app
Description: A plugin to help you to embed a GovRight AngularJS app into your site. Provides an easy app setup and automates some things like authentication callback and social sharing. Check <a href="https://github.com/GovRight/wp-corpus-embedded-app">the plugin Github page</a> for details and instructions.
Version: 1.1.7
Author: GovRight
Author URI: http://govright.org/
License: MIT
GitHub Plugin URI: https://github.com/GovRight/wp-corpus-embedded-app
GitHub Branch: master
*/

require_once(__DIR__ . '/includes/utils.php');
require_once(__DIR__ . '/includes/interceptors/auth.php');
require_once(__DIR__ . '/includes/interceptors/social.php');
require_once(__DIR__ . '/includes/settings.php');
require_once(__DIR__ . '/includes/shortcodes.php');
