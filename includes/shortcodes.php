<?php

add_shortcode('corpus-app', 'corpus_app_handler');

function corpus_app_handler() {
    return wpce_get_loader();
}
