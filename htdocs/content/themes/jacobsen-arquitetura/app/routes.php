<?php

/*
 * Define your routes and which views to display
 * depending of the query.
 *
 * Based on WordPress conditional tags from the WordPress Codex
 * http://codex.wordpress.org/Conditional_Tags
 *
 */

// Main pages

Route::get('template', array('home', function(){
    return View::make('pages.home');
}));

Route::get('template', array('studio', function(){
    return View::make('pages.studio');
}));

Route::get('template', array('contact', function(){
    return View::make('pages.contact');
}));

Route::get('postTypeArchive', array('projects', 'uses' => 'ProjectController@archive'));
Route::get('tax', array('project-categories', 'uses' => 'ProjectController@archive'));
Route::get('singular', array('projects', 'uses' => 'ProjectController@single'));

Route::get('postTypeArchive', array('media', function() {
    return View::make('cpt.media.archive');
}));

Route::get('singular', array('media', function() {
    return View::make('cpt.media.archive');
}));

Route::get('tax', array('media-categories', function() {
    return;
}));

Route::get('template', array('styleguide', 'uses' => 'StyleguideController@index'));
