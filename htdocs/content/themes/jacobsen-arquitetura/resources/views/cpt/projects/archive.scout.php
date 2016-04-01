@extends('layouts.master', ['header' => ['display' => false], 'footer' => ['logo' => true, 'copyright' => true]])

@section('main')
    @include('cpt.partials.filters', ['categories' => $categories, 'current_category' => $current_category, 'filter_parameter' => 'project-categories'])
    <section class="row row--vpadded row--flex projects-grid content-grid" data-content-grid>
@loop
<?php $post_fields = get_fields(); ?>
@if(get_post_thumbnail_id() != '')
        <div class="projects-grid__item content-grid__item animation--fadein">
            <div class="projects-grid__item--header">
                <h2 class="heading--epsilon heading--light uppercase projects-grid__item--title">{{ Loop::title() }}@if(isset($post_fields['is_new']) && $post_fields['is_new'] == true) <small class="projects-grid__item__title--new">{{ __('Novo', Config::get('application.textdomain')) }}</small>@endif</h2>
                <ul class="projects-grid__item__extras">
                    <li class="projects-grid__item__extras__item heading--iota heading--light uppercase">{{ isset($post_fields['date_end']) && $post_fields['date_end'] ? $post_fields['date_end'] : __('Em Andamento', Config::get('application.textdomain')) }}</li>
                    <li class="projects-grid__item__extras__item heading--iota heading--light uppercase">{{ isset($post_fields['category_featured']) && is_object($post_fields['category_featured']) ? $post_fields['category_featured']->name : '&mdash;' }}</li>
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
@if(preg_match("/<a\s+(?:[^>]*?\s+)?href=\"([^\"]*)\"/", get_next_posts_link(), $matches) == 1)
    <div class="row--vpadded content-grid__pagination projects-grid__pagination">
        <a href="{{ $matches[1] }}" class="button uppercase page-transition--none" data-content-grid-next>{{ Macros::symbol('symbols-plus',  __('Ver mais', Config::get('application.textdomain')), array('button__symbol')) }}{{ __('Ver mais', Config::get('application.textdomain')) }}</a>
    </div>
@endif
@overwrite
