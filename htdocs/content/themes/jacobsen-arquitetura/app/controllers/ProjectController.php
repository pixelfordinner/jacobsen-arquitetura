<?php

class ProjectController extends BaseController {

    protected $_data = array();

    public function __construct() {
        if (!function_exists('get_fields')) {
            throw new Exception('This theme requires The ACF Pro plugin.');
        }
    }

    protected function _getPostsData() {
        $currentPost = get_post();

        if (!is_a($currentPost, 'WP_Post')) {
            throw new Exception('Unable to retrieve current post data.');
        }

        $nextPost = get_next_post();

        $this->_data['posts'] = array(
            'current' => array(
                'object' => $currentPost,
                'fields' => get_fields()
            ),
            'next' => array(
                'object' => $nextPost,
                'fields' => is_a($nextPost, 'WP_Post') ? get_fields($nextPost->ID) : null
            )
        );
    }

    protected function _getCategories() {
        $args = array(
            'type'                     => 'post',
            'child_of'                 => 0,
            'parent'                   => '',
            'orderby'                  => 'menuorder',
            'hide_empty'               => false,
            'hierarchical'             => 1,
            'exclude'                  => array(1),
            'include'                  => '',
            'number'                   => '',
            'taxonomy'                 => 'project-categories',
            'pad_counts'               => false
        );

        $this->_data['categories'] = get_categories($args);
    }

    public function single() {
        $this->_getPostsData();

        return View::make('cpt.projects.single')
            ->with($this->_data);
    }

    public function archive() {
        $this->_getCategories();

        return View::make('cpt.projects.archive')
            ->with($this->_data);
    }
 }
