<?php

/*
 * Define your routes and which views to display
 * depending of the query.
 *
 * Based on WordPress conditional tags from the WordPress Codex
 * http://codex.wordpress.org/Conditional_Tags
 *
 */

// Home Page

Route::get('template', ['home', function(){
    return View::make('pages.home')->with(['fields' => get_fields()]);
}]);

// Studio Page

Route::get('template', ['studio', function(){
    return View::make('pages.studio')->with(['fields' => get_fields()]);;
}]);

// Contact Page

Route::get('template', ['contact', function(){
    return View::make('pages.contact')->with(['fields' => get_fields()]);
}]);

// Project CTP

Route::get('postTypeArchive', ['projects', 'uses' => 'ProjectController@archive']);
Route::get('tax', ['project-categories', 'uses' => 'ProjectController@archive']);
Route::get('singular', ['projects', 'uses' => 'ProjectController@single']);

// Media CPT

Route::get('postTypeArchive', ['media', 'uses' => 'MediaController@archive']);
Route::get('tax', ['media-categories', function() { wp_redirect(get_post_type_archive_link('media'), 301); }]);
Route::get('singular', ['media', function() { wp_redirect(get_post_type_archive_link('media'), 301); }]);

// Styleguide

Route::get('template', ['styleguide', 'uses' => 'StyleguideController@index']);
