@extends('layouts.master', ['header' => ['display' => false], 'footer' => ['logo' => true]])

@section('main')
    <div class="row--padded projects-filters">
@foreach ($categories as $category)
        <button class="button button--small button--filter uppercase" data-category-id="{{ $category->term_id }}">{{ $category->name }}</button>
@endforeach
    </div>
    <section class="row--vpadded row--flex projects-grid">
@loop
<?php
    $post_fields = get_fields();
    $thumb_url_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
    $thumb_url = $thumb_url_array[0];
?>
        <div class="projects-grid__item">
            <h2 class="heading--delta heading--light uppercase projects-grid__item--title">{{ Loop::title() }}</h2>
            <ul class="projects-grid__item__extras">
                <li class="projects-grid__item__extras__item heading--iota heading--light uppercase">{{ $post_fields['date_end'] ? $post_fields['date_end'] : __('In progress') }}</li>
                <li class="projects-grid__item__extras__item heading--iota heading--light uppercase">{{ $post_fields['category_featured']->name }}</li>
                <li class="projects-grid__item__extras__item heading--iota heading--light uppercase">{{ $post_fields['location_name'] }}</li>
            </ul>
            <a class="projects-grid__item--link" href="{{ Loop::link() }}">
                {{ Macros::responsive_image($thumb_url, 'project_thumbnails', array('project-grid__item__thumbnail')) }}
            </a>
        </div>
@endloop
    </section>
@overwrite
