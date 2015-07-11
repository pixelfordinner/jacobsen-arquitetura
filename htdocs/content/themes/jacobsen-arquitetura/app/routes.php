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

Route::get('postTypeArchive', array('projects', function() {
    return View::make('cpt.projects.archive');
}));

Route::get('singular', array('projects', function() {
    return View::make('cpt.projects.single');
}));

Route::get('postTypeArchive', array('media', function() {
    return View::make('cpt.media.archive');
}));

Route::get('singular', array('media', function() {
    return View::make('cpt.media.archive');
}));

Route::get('template', array('styleguide', function() {
    $assets = Application::get('assets');

    if (array_key_exists('styles', $assets)) {
        Asset::add('styleguide', $assets['styles']['path'].'/styleguide.css');
    }

    return View::make('pages.styleguide');
}));
