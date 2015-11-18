@extends('layouts.master', ['footer' => ['logo' => false, 'copyright' => false]])

@section('main')
@if(isset($fields['featured_projects']) && is_array($fields['featured_projects']))
    <div class="home-carousel slick-slider" data-slick='{"arrows":false, "dots": false, "accessibility": false, "autoplay": true, "autoplaySpeed": 3000, "fade": true}'>
@foreach ($fields['featured_projects'] as $project_object)
<?php
$project_id = $project_object->ID;
$project_fields = get_fields($project_id);
?>
        <div class="home-carousel__slide home-carousel__slide__cover-image cover-image--{{ $project_object->post_name }} slick-slide">
@include('components.cover-image', [
    'cover_image' => $project_fields['cover_image'],
    'selector' => 'cover-image--' . $project_object->post_name,
    'vertical_align' => isset($project_fields['vertical_align']) ? $project_fields['vertical_align'] : ''
])
        </div>
@endforeach
    </div>

    <div class="home-logo-wrapper animation--fadein">
        {{ Macros::symbol('jarquitetura-logo-type-expanded-shadow', 'Jacobsen Arquitetura Logo', array('home-logo')) }}
    </div>
@endif
@overwrite
