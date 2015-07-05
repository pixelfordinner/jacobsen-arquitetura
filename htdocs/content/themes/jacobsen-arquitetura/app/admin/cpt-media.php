<?php

// Project custom post type.

Taxonomy::make('media-categories', 'media',
    __('Categories', Application::get('textdomain')),
    __('Category', Application::get('textdomain')))
->set();

PostType::make('media',
    __('Media', Application::get('textdomain')),
    __('Media', Application::get('textdomain')))
->set(array(
    'public'        => true,
    'menu_position' => 20,
    'supports'      => array(
        'title',
        'page-attributes'
    ),
    'menu_icon'     => 'dashicons-images-alt2',
    'rewrite'       => array(
        'slug'          => 'media',
        'with_front'    => true
    ),
    'taxonomies'    => array(
        'media-category'
    )
));
