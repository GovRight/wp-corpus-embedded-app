<?php
add_action('plugins_loaded', function() {
    if($_GET['_escaped_fragment_']) {
        $social_url = wpce_config('social_url');
        if(empty($social_url)) {
            return;
        }
        $response = wp_remote_get($social_url . $_GET['_escaped_fragment_']);
        if(is_wp_error($response)) {
            echo $response->get_error_message();;
        } else {
            echo $response['body'];
        }
        die;
    }
});