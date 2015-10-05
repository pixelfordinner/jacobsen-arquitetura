@extends('layouts.master', ['header' => ['display' => false], 'footer' => ['logo' => true]])

@section('main')
    <div class="row--padded projects-filters" data-content-grid-filter-parameter="project-categories">
@foreach ($categories as $category)
        <a href="{{ get_term_link($category) }}" class="button button--small button--filter uppercase page-transition--none @if($category->slug == $current_category)button--active @endif"
            data-content-grid-filter="{{ $category->slug }}">{{ $category->name }}</a>
@endforeach
    </div>
    <section class="row--vpadded row--flex projects-grid content-grid" data-content-grid>
@loop
<?php $post_fields = get_fields(); ?>
        <div class="projects-grid__item content-grid__item">
            <div class="projects-grid__item--header">
                <h2 class="heading--delta heading--light uppercase projects-grid__item--title">{{ Loop::title() }}</h2>
                <ul class="projects-grid__item__extras">
                    <li class="projects-grid__item__extras__item heading--iota heading--light uppercase">{{ $post_fields['date_end'] ? $post_fields['date_end'] : __('In progress') }}</li>
                    <li class="projects-grid__item__extras__item heading--iota heading--light uppercase">{{ is_object($post_fields['category_featured']) ? $post_fields['category_featured']->name : __('None') }}</li>
                </ul>
            </div>
            <a class="projects-grid__item--link" href="{{ Loop::link() }}">
                {{ Macros::responsive_image(get_post_thumbnail_id(), 'project_thumbnails', array('project-grid__item__thumbnail')) }}
            </a>
        </div>
@endloop
    </section>
<?php $matches = array(); ?>
@if(preg_match("/<a\s+(?:[^>]*?\s+)?href=\"([^\"]*)\"/", get_next_posts_link(), $matches) == 1)
    <div class="row--vpadded project-grid__pagination">
        <a href="{{ $matches[1] }}" class="button uppercase page-transition--none" data-content-grid-next>{{ Macros::symbol('symbols-plus', 'Download', array('button__symbol')) }}{{ __('See more') }}</a>
    </div>
@endif
@overwrite
