@extends('layouts.master', ['header' => ['display' => false], 'footer' => ['logo' => true]])

@section('main')
@loop
        <article class="project">
            <time class="project__publication-date" datetime="{{ get_the_date('c') }}">{{ get_the_date() }}</time>
            <header class="row cover-image cover-image--{{ $posts['current']['object']->post_name }}">
@include('components.cover-image', ['cover_image' => $posts['current']['fields']['cover_image'], 'selector' => 'cover-image--' . $posts['current']['object']->post_name ])
            </header>
            <div class="container">
                <div class="row project-title">
                    <h1 class="heading--alpha heading--light uppercase">{{ Loop::title() }}</h1>
                </div>
                <div class="row row--flex row--stretch project-info">
                    <div class="column--half column--desktop project-location">
                        <div class="project-location__name--wrapper">
                            <h3 class="heading--zeta heading--light uppercase project-location__name">{{ $posts['current']['fields']['location_name'] }}</h3>
                        </div>
                        <div class="project-location__map"
                            data-gmap-lat="{{ $posts['current']['fields']['location_data']['lat'] }}"
                            data-gmap-lng="{{ $posts['current']['fields']['location_data']['lng'] }}"
                            data-gmap-icon="{{ Macros::get_image_path('marker.svg') }}"
                            data-gmap-icon-title="{{ $posts['current']['fields']['location_name'] }}">
                        </div>
                    </div>
                    <div class="column--half column--desktop project-details">
                        @include('components.dlist', ['dlist' => $posts['current']['fields']['technical_data']])
                    </div>
                </div>
                <div class="project-content">
@foreach($posts['current']['fields']['content'] as $content)
@if($content['acf_fc_layout'] == 'fullwidth_image')
                    <div class="row row--vpadded">
                        <div class="column">
                            {{ Macros::responsive_image($content['image'], $content['acf_fc_layout'], array('image--fullwidth')) }}
                        </div>
                    </div>
@elseif($content['acf_fc_layout'] == 'halfwidth_images')
                    <div class="row row--flex row--vpadded">
                        <div class="column--half column--tablet">
                            {{ Macros::responsive_image($content['left_image'], $content['acf_fc_layout'], array('image--halfwidth')) }}
                        </div>
                        <div class="column--half column--tablet">
                            {{ Macros::responsive_image($content['right_image'], $content['acf_fc_layout'], array('image--halfwidth')) }}
                        </div>
                    </div>
@elseif($content['acf_fc_layout'] == 'blueprints')
@if (is_array($content['blueprints']))
                    <div class="row row--vpadded">
                        <div class="column">
                            <div class="carousel slick-slider" data-slick='{"arrows":false, "dots": true, "accessibility": false}'>
@foreach($content['blueprints'] as $blueprint)
                                <div class="slick-slide">
                                    {{ Macros::responsive_image($blueprint, 'fullwidth_image', array('image--fullwidth')) }}
                                </div>
@endforeach
                            </div>
                        </div>
                    </div>
@endif
@elseif($content['acf_fc_layout'] == 'text')
                    <div class="row row--padded">
                        <div class="column text">
                            {{ $content['text'] }}
                        </div>
                    </div>
@endif
@endforeach
                </div>
            </div>
        </article>
@endloop
@if($posts['next']['object'])
            <div class="row cover-image cover-image--next cover-image--{{ $posts['next']['object']->post_name }}">
@include('components.cover-image', ['cover_image' => $posts['next']['fields']['cover_image'], 'selector' => 'cover-image--' . $posts['next']['object']->post_name])
                <a href="{{ get_permalink($posts['next']['object']->ID) }}" class="next-project">
                   <span class="heading--zeta heading--light uppercase next-project__label">{{ __('Next project') }}</span>
                   <span class="heading--beta heading--light uppercase next-project__title">{{ $posts['next']['object']->post_title }}</span>
                </a>
            </div>
@endif
@overwrite
