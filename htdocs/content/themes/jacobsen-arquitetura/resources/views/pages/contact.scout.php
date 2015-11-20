@extends('layouts.master', ['header' => ['display' => true], 'footer' => ['logo' => false, 'copyright' => true]])

@section('main')
    <div class="container--large">
@if(isset($fields['offices']))
        <div class="row row--flex">
            <section class="row row--flex row--stretch contact-offices column--half column--desktop-medium">
                <div class="column--half column--tablet contact-offices__map"></div>
                <div class="column--half column--tablet contact-offices__locations-list">
<?php $first = true; ?>
@foreach($fields['offices'] as $office)
                    <div class="contact-office">
                        <a href="#" class="contact-office__location-link no-defaults @if($first === true) contact-office__location-link--active @endif"
                            data-target-lat="{{ $office['location_data']['lat'] }}"
                            data-target-lng="{{ $office['location_data']['lng'] }}"
                            data-target-icon="{{ Macros::get_image_path('marker.svg') }}"
                            data-target-icon-title="{{ $office['name'] }}">
                            <h3 class="heading--epsilon heading--light uppercase contact-office__location-name">{{ Macros::symbol('symbols-marker', 'Pin', array('contact-office__location-icon')) }}{{ $office['name'] }}</h3>
                        </a>
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
            <section class="row row--flex row--stretch instagram-content column--half column--desktop-medium">
                Instagram Content
            </section>
        </div>
@endif
    </div>
@overwrite
