<?php
add_action('after_setup_theme', function() {
    if(isset($_GET['_escaped_fragment_'])) {
        $white_list = apply_filters('wpce_social_urls_white_list', '*') ?: '*';
        if($white_list !== '*') {
            $white_list = wpce_normalize_urls($white_list);
        }
        $current_path = wpce_normalize_urls($_SERVER['REQUEST_URI'], true);

        if($white_list === '*' || in_array($current_path, $white_list)) {
            $social_url = wpce_config('social_url');
            $law_slug = trim(get_option('wpce_law_slug'));
            if (empty($social_url)) {
                return;
            }
            // _escaped_fragment_ usually goes first
            $fragment = urldecode(str_replace('_escaped_fragment_=', '', $_SERVER['QUERY_STRING']));
            $locale = defined('ICL_LANGUAGE_CODE') && ICL_LANGUAGE_CODE ? ICL_LANGUAGE_CODE : 'en';

            if (!empty($law_slug)) {
                $law_route = '/' . $locale . '/' . trim(wpce_config('law_route'), '/') . '/';
                if ($fragment[1] === '?' || $fragment === '/') {
                    $fragment = ltrim($fragment, '/');
                }
                $path = $law_route . $law_slug . $fragment;
            } else {
                $path = $fragment;
            }

            $url = $social_url . '?path=' . $path;
            $port = parse_url($social_url, PHP_URL_PORT);
            if ($port) {
                $url .= '&port=' . $port;
            }
            $response = wp_remote_get($url, array('timeout' => 10));

            // In case of error or something just show a Wordpress page
            // At least something will be displayed
            if (!is_wp_error($response) && !empty($response['body'])) {
                echo $response['body'];
                die;
            } else {
                error_log('FAILED RESPONSE wp-corpus-embedded-app:/interceptors/social: ' . print_r($response));
            }
        }
    }
});
