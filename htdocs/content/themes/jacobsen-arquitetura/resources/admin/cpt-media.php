<?php

// Project custom post type.

Taxonomy::make('media-categories', 'media',
    __('Categories', Config::get('application.textdomain')),
    __('Category', Config::get('application.textdomain')))
->set(array(
    'query_vars' => true,
    'rewrite' => array(
        'slug' => 'media/category'
    )
));

PostType::make('media',
    __('Media', Config::get('application.textdomain')),
    __('Media', Config::get('application.textdomain')))
->set(array(
    'public'        => true,
    'menu_position' => 20,
    'supports'      => array(
        'title',
        'thumbnail',
        'revisons',
        'page-attributes'
    ),
    'menu_icon'     => 'dashicons-images-alt2',
    'rewrite'       => array(
        'slug'          => 'midia',
        'with_front'    => true
    ),
    'taxonomies'    => array(
        'media-category'
    ),
    'has_archive'   => true
));
