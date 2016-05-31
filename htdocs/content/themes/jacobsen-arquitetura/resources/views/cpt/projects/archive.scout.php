@extends('layouts.master', ['header' => ['display' => false], 'footer' => ['logo' => true, 'copyright' => true], 'no_caching' => true])

@section('main')
    @include('cpt.partials.filters', ['categories' => $categories, 'current_category' => $currentCategory, 'filter_parameter' => 'project-categories'])
    <section class="row row--vpadded row--flex projects-grid content-grid" data-content-grid="projects">
@loop
<?php
    $is_new = get_field('is_new');
    $date_end = get_field('date_end');
    $category_featured = get_field('category_featured');
?>
@if(get_post_thumbnail_id() != '')
        <div class="projects-grid__item content-grid__item animation--fadein" id="project-{{ Loop::id() }}">
            <div class="projects-grid__item--header">
                <h2 class="heading--epsilon heading--light uppercase projects-grid__item--title">{{ Loop::title() }}@if(isset($is_new) && $is_new == true) <small class="projects-grid__item__title--new">{{ __('Novo', Config::get('application.textdomain')) }}</small>@endif</h2>
                <ul class="projects-grid__item__extras">
                    <li class="projects-grid__item__extras__item heading--iota heading--light uppercase">{{ isset($date_end) ? $date_end : __('Em Andamento', Config::get('application.textdomain')) }}</li>
                    <li class="projects-grid__item__extras__item heading--iota heading--light uppercase">{{ isset($category_featured) && is_object($category_featured) ? $category_featured->name : '&mdash;' }}</li>
                </ul>
            </div>
            <a class="projects-grid__item--link" href="{{ Loop::link() }}">
                {{ Macros::responsive_image(get_post_thumbnail_id(), 'project_thumbnails', array('projects-grid__item__thumbnail')) }}
            </a>
        </div>
@endif
@endloop
    </section>
<?php $matches = array(); ?>
    <div class="row--vpadded content-grid__pagination projects-grid__pagination">
@if($nextPageLink)
        <a href="{{ $nextPageLink }}" class="button uppercase page-transition--none" data-content-grid-next="{{ $currentPage + 1 }}">{{ Macros::symbol('symbols-plus',  __('Ver mais', Config::get('application.textdomain')), array('button__symbol')) }}{{ __('Ver mais', Config::get('application.textdomain')) }}</a>
@else
        <a href="#" class="button uppercase page-transition--none button--transparent" data-content-grid-next></a>
@endif
    </div>

@overwrite
