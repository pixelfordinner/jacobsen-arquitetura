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
                <div class="row row--stretch project-info">
                    <div class="column--half project-location">
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
                    <div class="column--half project-details">
                        @include('components.dlist', ['dlist' => $fields['technical_data']])
                    </div>
                </div>
            </div>
@endloop
@overwrite
