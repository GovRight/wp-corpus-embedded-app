<?php
$WPCE_CONFIG = array(
    'rev-tracker' => array(
        'auth_post_url' => 'http://revtracker/auth/success',
        'social_url' => 'http://revtracker/social'
    ),
    'legislation-lab' => array(
        'auth_post_url' => 'http://legislation-lab.org/auth/success',
        'social_url' => 'http://legislation-lab.org/social'
    )
);

if(is_array($GLOBALS['WPCE_LOCAL_CONFIG'])) {
    $WPCE_CONFIG = array_replace_recursive($WPCE_CONFIG, $GLOBALS['WPCE_LOCAL_CONFIG']);
}

return $WPCE_CONFIG;
