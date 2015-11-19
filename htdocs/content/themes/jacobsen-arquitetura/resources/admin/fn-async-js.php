<?php

// Quick hack, while WP enables this natively.

function scripts_attributes($url)
{
    $search = array('#async', '#defer');
    $replace = array('\' async=\'async', '\' defer=\'defer');

    return str_replace($search, $replace, $url);
}

add_filter('clean_url', 'scripts_attributes', 11, 1);
