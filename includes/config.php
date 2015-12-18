<?php
$WPCE_CONFIG = array(
    'rev-tracker' => array(
        'name' => 'Revision Tracker',
        'auth_post_url' => 'http://revtracker.legislationlab.org/auth/success',
        'social_url' => 'http://revtracker.legislationlab.org/social',
        'loader_url' => 'http://revtracker.legislationlab.org/loader.js',
        'law_route' => '/law/'
    ),
    'impact-project' => array(
        'name' => 'Legal Impact Watch'
    )
);

if(is_array($GLOBALS['WPCE_LOCAL_CONFIG'])) {
    $WPCE_CONFIG = array_replace_recursive($WPCE_CONFIG, $GLOBALS['WPCE_LOCAL_CONFIG']);
}

return $WPCE_CONFIG;
