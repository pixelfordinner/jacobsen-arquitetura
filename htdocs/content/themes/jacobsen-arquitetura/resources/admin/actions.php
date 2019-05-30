<?php

Action::add('pre_get_posts', 'ProjectController');

add_filter('acf/fields/google_map/api', function ($api) {
    $api['key'] = 'AIzaSyDn2-8djSEe3QYLURqcIFY27rqTD3AWMpI';

    return $api;
});
