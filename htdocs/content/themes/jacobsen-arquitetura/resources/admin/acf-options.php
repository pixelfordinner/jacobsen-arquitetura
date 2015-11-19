<?php

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => __('Theme Settings'),
        'menu_title'    => __('Theme Settings'),
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => __('Social Media'),
        'menu_title'    => __('Social Media'),
        'parent_slug'   => 'theme-settings',
    ));

    View::share('theme_options', get_fields('option'));
}
