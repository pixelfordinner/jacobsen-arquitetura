<?php $social_media = array('facebook', 'twitter');
$api_keys = Config::get('application.api-keys');

$media = [
    'facebook' => [
        'entrypoint' => 'https://www.facebook.com/dialog/share',
        'params' => [
            'app_id' => $api_keys['facebook'],
            'hashtag' => __('#jacobsenarquitetura', Config::get('application.textdomain')),
            'display' => 'page',
            'href' => get_permalink($post->ID),
            'redirect_uri' => 'https://www.facebook.com'
        ]
    ],
    'twitter' => [
        'entrypoint' => 'https://twitter.com/intent/tweet',
        'params' => [
            'url' => get_permalink($post->ID),
            'text' => __('Project %s from Jacobsen Arquitetura', Config::get('application.textdomain')),
            'hashtags' => __('jacobsenarquitetura,brazilianarchitecture', Config::get('application.textdomain')),
        ]
    ]
];

foreach ($media as &$media_data) {
    if (isset($media_data['params']['text'])) {
        $media_data['params']['text'] = sprintf($media_data['params']['text'], $post->post_title);
    }
    $media_data['url'] = $media_data['entrypoint'] . '?' .
        http_build_query($media_data['params'], NULL, '&amp;', PHP_QUERY_RFC3986);
}
?>
                    <div class="row project-share">
                        <div class="column">
                            <h4 class="heading--eta heading--light uppercase project-share__text">{{ __('Share', Config::get('application.textdomain')) }}:</h4>
                            <ul class="social-media-list">
@foreach($social_media as $item)
<?php
$key_name = 'social_media_' . $item;
$symbol_name = 'social-' . $item;
?>
                                <li class="social-media-list__item">
                                    <a class="no-defaults social-media-list__item__link" target="_blank" href="{{ $media[$item]['url'] }}" title="{{ ucwords($item) }}">{{ Macros::symbol($symbol_name, ucwords($item), array('social-media-list__item__symbol')) }}</a>
                                </li>
@endforeach
                            </ul>
                        </div>
                    </div>
