@extends('layouts.master', ['header' => ['display' => false], 'footer' => ['logo' => true, 'copyright' => true]])

@section('main')
    @include('cpt.partials.filters', ['categories' => $categories, 'current_category' => $currentCategory, 'filter_parameter' => 'media-categories'])
    <div class="container--large">
        <section class="row row--vpadded media-grid content-grid" data-masonry-options='{ "itemSelector": ".content-grid__item", "columnWidth": ".content-grid__item", "percentPosition": true }' data-content-grid="media">
@loop
<?php
    $post_fields = get_fields();
    $thumbnail_id = get_post_thumbnail_id();
?>
@if($thumbnail_id != '')
            <div class="media-grid__item content-grid__item">
                <div class="media-grid__item--thumbnail">
                    <a href="{{ $post_fields['pdf'] }}" target="_blank">
                        {{ Macros::responsive_image($thumbnail_id, 'media_thumbnails', array('media-grid__item__thumbnail')) }}
                    </a>
                </div>
                <div class="row row--flex media-grid__item--footer">
                    <div class="column--tablet column--two-thirds media-grid__item--info">
                        <time class="heading--theta heading--light media__publication-date" datetime="{{ get_the_date('c') }}">{{ get_the_date('m/Y') }}</time>
                        <h2 class="heading--zeta heading--light uppercase media-grid__item--title">{{ Loop::title() }}</h2>
                    </div>
                    <div class="column--tablet column--third media-grid__item--link">
                        <a href="{{ $post_fields['pdf'] }}" class="button button--small uppercase" target="_blank">{{ Macros::symbol('symbols-download', __('Baixar PDF', Config::get('application.textdomain')), array('button__symbol')) }}{{ __('PDF', Config::get('application.textdomain')) }}</a>
                    </div>
                </div>
            </div>
@endif
@endloop
        </section>
<?php $matches = array(); ?>
@if(preg_match("/<a\s+(?:[^>]*?\s+)?href=\"([^\"]*)\"/", get_next_posts_link(), $matches) == 1)
    <div class="row--vpadded content-grid__pagination media-grid__pagination">
        <a href="{{ $matches[1] }}" class="button uppercase page-transition--none" data-content-grid-next>{{ Macros::symbol('symbols-plus',  __('Ver mais', Config::get('application.textdomain')), array('button__symbol')) }}{{ __('Ver mais', Config::get('application.textdomain')) }}</a>
    </div>
@endif
    </div>
@overwrite
