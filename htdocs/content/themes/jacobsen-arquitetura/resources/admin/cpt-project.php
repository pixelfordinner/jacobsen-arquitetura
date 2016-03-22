<?php

// Project custom post type.

Taxonomy::make('project-categories', 'projects',
    __('Categories', Config::get('application.textdomain')),
    __('Category', Config::get('application.textdomain')))
->set(array(
    'query_var' => true,
    'rewrite' => array(
        'slug' => 'projetos/categoria'
    )
));

PostType::make('projects',
    __('Projects', Config::get('application.textdomain')),
    __('Project', Config::get('application.textdomain')))
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
        'slug'          => 'projetos',
        'with_front'    => true
    ),
    'taxonomies'    => array(
        'project-category'
    )
));
