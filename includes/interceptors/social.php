<?php
add_action('plugins_loaded', function() {
    if($_GET['_escaped_fragment_']) {
        $social_url = wpce_config('social_url');
        $law_slug = trim(get_option('wpce_law_slug'));
        if(empty($social_url)) {
            return;
        }

        if(!empty($law_slug)) {
            $law_route = '/' . trim(wpce_config('law_route'), '/') . '/';
            $path = $law_route . $law_slug . $_GET['_escaped_fragment_'];
        } else {
            $path = $_GET['_escaped_fragment_'];
        }

        $response = wp_remote_get($social_url . $path);

        if(is_wp_error($response)) {
            echo $response->get_error_message();;
        } else {
            echo $response['body'];
        }
        die;
    }
});