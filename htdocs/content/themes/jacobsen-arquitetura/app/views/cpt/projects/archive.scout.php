@extends('layouts.master', ['header' => ['display' => false], 'footer' => ['logo' => true]])

@section('main')
    <div class="row--padded projects-filters">
@foreach ($categories as $category)
        <a href="{{ get_term_link($category) }}" class="button button--small button--filter uppercase @if($category->slug == $current_category)button--active @endif" data-category-id="{{ $category->term_id }}">{{ $category->name }}</a>
@endforeach
    </div>
    <section class="row--vpadded row--flex projects-grid">
@for($i=0; $i < 6; $i++)
@loop
<?php $post_fields = get_fields(); ?>
        <div class="projects-grid__item">
            <div class="projects-grid__item--header">
                <h2 class="heading--delta heading--light uppercase projects-grid__item--title">{{ Loop::title() }}</h2>
                <ul class="projects-grid__item__extras">
                    <li class="projects-grid__item__extras__item heading--iota heading--light uppercase">{{ $post_fields['date_end'] ? $post_fields['date_end'] : __('In progress') }}</li>
                    <li class="projects-grid__item__extras__item heading--iota heading--light uppercase">{{ $post_fields['category_featured']->name }}</li>
                </ul>
            </div>
            <a class="projects-grid__item--link" href="{{ Loop::link() }}">
                {{ Macros::responsive_image(get_post_thumbnail_id(), 'project_thumbnails', array('project-grid__item__thumbnail')) }}
            </a>
        </div>
@endloop
@endfor
    </section>
@overwrite
