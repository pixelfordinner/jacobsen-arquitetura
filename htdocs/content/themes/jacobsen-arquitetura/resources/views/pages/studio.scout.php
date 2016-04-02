@extends('layouts.master', ['header' => ['display' => false], 'footer' => ['logo' => true, 'copyright' => true]])

@section('main')
@loop
        <div class="studio">
            <header class="row cover-image cover-image--studio animation--fadein">
@include('components.cover-image', [
    'cover_image' => $fields['cover_image'],
    'selector' => 'cover-image--studio',
    'vertical_align' => isset($fields['vertical_align']) ? $fields['vertical_align'] : ''
])
            </header>
            <div class="container">
                <div class="studio-content">
@if(is_array($fields['content']))
@foreach($fields['content'] as $content)
@if($content['acf_fc_layout'] == 'fullwidth_image')
                    <div class="row row--vpadded">
                        <div class="column">
                            {{ Macros::responsive_image($content['image'], $content['acf_fc_layout'], array('image--fullwidth', 'animation--fadein')) }}
                        </div>
                    </div>
@elseif($content['acf_fc_layout'] == 'halfwidth_images')
                    <div class="row row--flex row--vpadded">
                        <div class="column--half column--tablet">
                            {{ Macros::responsive_image($content['left_image'], $content['acf_fc_layout'], array('image--halfwidth', 'animation--fadein')) }}
                        </div>
                        <div class="column--half column--tablet">
                            {{ Macros::responsive_image($content['right_image'], $content['acf_fc_layout'], array('image--halfwidth', 'animation--fadein')) }}
                        </div>
                    </div>
@elseif($content['acf_fc_layout'] == 'blueprints')
@if (is_array($content['blueprints']))
                    <div class="row row--vpadded">
                        <div class="column blueprints">
                            <div class="carousel slick-slider" data-slick='{"arrows":false, "dots": true, "accessibility": false}'>
@foreach($content['blueprints'] as $blueprint)
                                <div class="slick-slide">
                                    {{ Macros::responsive_image($blueprint, 'fullwidth_image', array('image--fullwidth', 'animation--fadein')) }}
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
@elseif($content['acf_fc_layout'] == 'video')
                    <div class="row row--vpadded">
                        <div class="column">
                            <div class="video-embed">
                                {{ Macros::responsive_video_embed($content['video_provider'], $content['video_id']) }}
                            </div>
                        </div>
                    </div>
@elseif($content['acf_fc_layout'] == 'heading')
                    <div class="row row--padded">
                        <div class="column narrow">
                            <h3 class="heading--zeta heading--light heading--strikethrough uppercase">{{ $content['heading'] }}</h3>
                        </div>
                    </div>
@elseif($content['acf_fc_layout'] == 'list')
                    <div class="row row--padded">
                        <div class="column text">
@include('components.dlist', ['dlist' => [$content], 'classes' => ['dl--studio']])
                        </div>
                    </div>
@elseif($content['acf_fc_layout'] == 'team')
                    <div class="row row--padded">
                        <div class="column">
                            <ul class="team-list row--flex">
@foreach($content['content'] as $member)
                            <li class="team-member">
                                <figure class="team-member__picture-container">
                                    {{ Macros::responsive_image($member['photo'], 'team_portraits', array('team-member__picture', 'animation--fadein')) }}
                                </figure>
                                <figcaption class="team-member__description">
                                    <h4 class="heading--eta uppercase">{{ $member['name'] }}</h4>
                                    <h5 class="heading--theta heading--light lowercase">{{ $member['function'] }}</h5>
                                </figcaption>
                            </li>
@endforeach
                            </ul>
                        </div>
                    </div>
@endif
@endforeach
@endif
                </div>
            </div>
        </div>
@endloop
@overwrite
