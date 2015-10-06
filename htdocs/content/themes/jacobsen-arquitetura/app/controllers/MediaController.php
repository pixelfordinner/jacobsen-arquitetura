<?php

class MediaController extends BaseController {

    protected $_data = array();

    public function __construct() {
        if (!function_exists('get_fields')) {
            throw new Exception('This theme requires The ACF Pro plugin.');
        }
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
            'taxonomy'                 => 'media-categories',
            'pad_counts'               => false
        );

        $this->_data['categories'] = get_categories($args);
    }

    protected function _getCurrentCategory($query) {
        $this->_data['current_category'] = null;

        if (array_key_exists('media-categories', $query->query)) {
            $this->_data['current_category'] = $query->query['media-categories'];
        }
    }

    public function archive($post, $query) {
        $this->_getCategories();
        $this->_getCurrentCategory($query);

        return View::make('cpt.media.archive')
            ->with($this->_data);
    }
 }
