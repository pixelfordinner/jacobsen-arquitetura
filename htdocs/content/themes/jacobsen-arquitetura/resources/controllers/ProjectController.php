<?php

class ProjectController extends BaseController {

    protected static $_data = array();

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

        $nextPost = get_previous_post();

        self::$_data['posts'] = array(
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
            'orderby'                  => 'menu_order',
            'hide_empty'               => true,
            'hierarchical'             => 1,
            'exclude'                  => array(1),
            'include'                  => '',
            'number'                   => '',
            'taxonomy'                 => 'project-categories',
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

    protected function _getNextPageLink($query) {
        $currentPostCount = self::$_data['currentPage'] * self::$_data['postsPerPage'];

        if ($currentPostCount < $query->found_posts) {
            self::$_data['nextPageLink'] = get_pagenum_link(self::$_data['currentPage'] + 1);
        } else {
            self::$_data['nextPageLink'] = false;
        }
    }

    public function single() {
        $this->_getPostsData();

        return View::make('cpt.projects.single')
            ->with(self::$_data);
    }

    public function archive($post, $query) {
        $this->_getCategories();
        $this->_getCurrentCategory($query);
        $this->_getNextPageLink($query);

        return View::make('cpt.projects.archive')
            ->with(self::$_data);
    }

    public function pre_get_posts($query) {
        if (is_admin() || (!is_post_type_archive('projects') &&
            !is_tax('project-categories')) || isset(self::$_data['_alteredQuery'])) {
            return $query;
        }

        self::$_data['_alteredQuery'] = true;
        $filters = $this->_getFilters();
        self::$_data['postsPerPage'] = absint(get_option('posts_per_page'));
        $cookiePagination = false;

        // Basic query
        $args = [
            'post_type' => 'projects',
            'orderby' => 'menu_order',
            'order' => 'ASC'
        ];

        // Apply filters through tax_query
        if (is_array($filters) && count($filters) > 0) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'project-categories',
                    'terms' => $filters,
                    'field' => 'slug',
                    'operator' => 'AND'
                ]
            ];
        }

        // Apply pagination if any
        if (get_query_var('paged')) {
            $args['paged'] = get_query_var('paged');
        } else if (array_key_exists('_projects_paged', $_COOKIE) &&
            absint($_COOKIE['_projects_paged']) > 1) {
            $cookiePagination = true;
            $args['posts_per_page'] = absint($_COOKIE['_projects_paged']) * self::$_data['postsPerPage'];
        } else {
            $args['paged'] = 1;
        }

        $query->parse_query($args);

        self::$_data['currentPage'] = get_query_var('paged');

        if ($cookiePagination) {
            self::$_data['currentPage'] = absint($_COOKIE['_projects_paged']);
        }

        return $query;
    }

    protected function _getFilters() {
        if (get_query_var('project-categories')) {
            return explode(',', get_query_var('project-categories'));
        }

        if (array_key_exists('_projects_filters', $_COOKIE)) {
            return explode(',', urldecode($_COOKIE['_projects_filters']));
        }

        return [];
    }
 }
