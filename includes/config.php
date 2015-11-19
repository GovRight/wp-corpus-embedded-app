<?php
$WPCE_CONFIG = array(
    'rev-tracker' => array(
        'name' => 'Revision Tracker',
        'auth_post_url' => 'http://revtracker/auth/success',
        'social_url' => 'http://revtracker',
        'loader_url' => 'http://retracker/loader.js',
        'law_route' => '/law/'
    ),
    'impact-project' => array(
        'name' => 'Law Impact Project'
    ),
    'legislation-lab' => array(
        'name' => 'Legislation Lab'
    )
);

if(is_array($GLOBALS['WPCE_LOCAL_CONFIG'])) {
    $WPCE_CONFIG = array_replace_recursive($WPCE_CONFIG, $GLOBALS['WPCE_LOCAL_CONFIG']);
}

return $WPCE_CONFIG;
