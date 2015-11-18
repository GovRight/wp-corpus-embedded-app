<?php
add_action('plugins_loaded', function() {
    if($_SERVER['REQUEST_URI'] === '/auth/success') {
        $post_url = wpce_config('auth_post_url');
        if(empty($post_url)) {
            return;
        }
        $response = wp_remote_post($post_url, array(
            'body' => $_POST
        ));
        if(is_wp_error($response)) {
            echo $response->get_error_message();;
        } else {
            echo $response['body'];
        }
        die;
    }
});
