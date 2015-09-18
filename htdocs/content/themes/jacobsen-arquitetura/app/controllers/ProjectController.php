<?php

class ProjectController extends BaseController {

    protected $_data = array();

    public function __construct() {
        if (!function_exists('get_fields')) {
            throw new Exception('This theme requires The ACF Pro plugin.');
        }

        $this->_getPostsData();
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

    public function index() {
        return View::make('cpt.projects.single')
            ->with($this->_data);
    }
}
