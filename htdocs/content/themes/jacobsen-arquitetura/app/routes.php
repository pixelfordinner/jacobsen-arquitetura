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

Route::get('template', array('media', function(){
    return View::make('pages.media');
}));

Route::get('template', array('contact', function(){
    return View::make('pages.contact');
}));
