<?php

// Project custom post type.

Taxonomy::make('project-categories', 'projects',
    __('Categories', Application::get('textdomain')),
    __('Category', Application::get('textdomain')))
->set();

PostType::make('projects',
    __('Projects', Application::get('textdomain')),
    __('Project', Application::get('textdomain')))
->set(array(
    'public'        => true,
    'menu_position' => 20,
    'supports'      => array(
        'title',
        'thumbnail',
        'revisons',
        'page-attributes'
        ),
    'menu_icon'     => 'dashicons-schedule',
    'rewrite'       => array(
        'slug'          => __('projects', Application::get('textdomain')),
        'with_front'    => true
        ),
    'taxonomies'    => array(
        'project-category'
        )
));
