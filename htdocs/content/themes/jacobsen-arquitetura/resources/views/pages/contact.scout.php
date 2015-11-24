@extends('layouts.master', ['header' => ['display' => true], 'footer' => ['logo' => false, 'copyright' => true]])

@section('main')
    <div class="container--large contact-container">
@if(isset($fields['offices']))
        <div class="row row--flex">
            <section class="row row--flex row--stretch contact-offices column--half column--desktop-medium contact-offices">
                <div class="column--half column--tablet contact-offices__map" data-target-element></div>
                <div class="column--half column--tablet contact-offices__locations-list">
<?php $first = true; ?>
@foreach($fields['offices'] as $office)
                    <div class="contact-office">
                        <div class="contact-office__location-link @if($first === true) contact-office__location-link--active @endif"
                            data-target-lat="{{ $office['location_data']['lat'] }}"
                            data-target-lng="{{ $office['location_data']['lng'] }}"
                            data-target-icon="{{ Macros::get_image_path('marker.svg') }}"
                            data-target-icon-title="{{ $office['name'] }}">
                            <h3 class="heading--epsilon heading--light uppercase contact-office__location-name">{{ Macros::symbol('symbols-marker', 'Pin', array('contact-office__location-icon')) }}{{ $office['name'] }}</h3>
                        </div>
                        <ul class="contact-office__location-info body--theta">
@foreach($office['data'] as $data)
                            <li class="contact-office__location-info__item">{{ $data['value'] }}</li>
@endforeach
                        </ul>
                    </div>
<?php $first = false; ?>
@endforeach
                </div>
            </section>
            <section class="row column--half column--desktop-medium contact__social-media">
<?php
$instagram_settings = json_encode([
    'clientId' => $theme_options['instagram_client_id'],
    'userId' => $theme_options['instagram_user_id'],
    'get' => 'user',
    'limit' => $theme_options['instagram_photo_count'],
    'resolution' => 'standard_resolution',
    'template' => '<a class="instagram-content__link" href="{{link}}" target="_blank"><img class="instagram-content__image" src="{{image}}" width="{{width}}" height="{{height}}" /></a>'
]);
?>
                <div class="contact__social-media__instagram" data-instagram='{{ $instagram_settings }}'></div>
                <div class="contact__social-media__links">
                <ul class="social-media-list contact__social-media-list">
<?php $social_media = array('facebook', 'instagram', 'pinterest', 'vimeo'); ?>
@foreach($social_media as $item)
<?php
$key_name = 'social_media_' . $item;
$symbol_name = 'social-' . $item;
?>
                    <li class="social-media-list__item">
                        <a class="no-defaults social-media-list__item__link" target="_blank" href="{{ $theme_options[$key_name] }}" title="{{ ucwords($item) }}">{{ Macros::symbol($symbol_name, ucwords($item), array('social-media-list__item__symbol')) }}</a>
                    </li>
@endforeach
                </ul>
                </div>
            </section>
        </div>
@endif
    </div>
@overwrite
