<?php

class MediaController extends BaseController {

    protected static $_data = array();

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

        self::$_data['categories'] = get_categories($args);
    }

    protected function _getCurrentCategory($query) {
        self::$_data['currentCategory'] = [];
        $tax_query = $query->get('tax_query');

        if (is_array($tax_query) && count($tax_query) > 0) {
            self::$_data['currentCategory'] = $tax_query[0]['terms'];
        }
    }

    public function archive($post, $query) {
        $this->_getCategories();
        $this->_getCurrentCategory($query);

        return View::make('cpt.media.archive')
            ->with(self::$_data);
    }
 }
