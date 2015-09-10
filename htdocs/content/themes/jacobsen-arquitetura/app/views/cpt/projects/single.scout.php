@extends('layouts.master', ['header' => ['display' => false], 'footer' => ['logo' => true]])

@section('main')
@loop
            <div class="row cover-image">
@include('components.cover-image', ['cover_image' => $fields['cover_image']])
            </div>
            <div class="container">
                <div class="row project-title">
                    <h1 class="heading--alpha heading--light uppercase">{{ Loop::title() }}</h1>
                </div>
                <div class="row row--flex row--stretch project-info">
                    <div class="column--half column--desktop project-location">
                        <div class="project-location__name--wrapper">
                            <h3 class="heading--zeta heading--light uppercase project-location__name">{{ $fields['location_name'] }}</h3>
                        </div>
                        <div class="project-location__map"
                            data-gmap-lat="{{ $fields['location_data']['lat'] }}"
                            data-gmap-lng="{{ $fields['location_data']['lng'] }}"
                            data-gmap-icon="{{ Macros::get_image_path('marker.svg') }}"
                            data-gmap-icon-title="{{ $fields['location_name'] }}">
                        </div>
                    </div>
                    <div class="column--half column--desktop project-details">
                        @include('components.dlist', ['dlist' => $fields['technical_data']])
                    </div>
                </div>
                <div class="project-content">
@foreach($fields['content'] as $content)
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
@elseif($content['acf_fc_layout'] == 'text')
                    <div class="row row--vpadded">
                        <div class="column text">
                            {{ $content['text'] }}
                        </div>
                    </div>
@endif
@endforeach
                </div>
            </div>
@endloop
@overwrite
