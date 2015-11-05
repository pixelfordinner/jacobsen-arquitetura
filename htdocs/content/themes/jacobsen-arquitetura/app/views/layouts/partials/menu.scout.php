        <button class="button uppercase menu-toggle menu-toggle--fixed" data-menu-toggle>
            <span class="button__symbol">
                <span class="menu-toggle__symbol--left"></span>
                <span class="menu-toggle__symbol--right"></span>
            </span>{{ __('Menu', Application::get('textdomain')) }}
        </button>
        <section class="menu-content" data-menu-content data-menu-content-anim-duration="500">
@if(isset($languages) && is_array($languages))
            <div class="button__group menu-content__language-list menu-content__item--fadein" role="group" aria-label="{{ __('Languages') }}">
@foreach($languages as $short_name => $language)
<?php $active = $language['active'] === true ? ' menu-content__language-list__item--active' : ''; ?>
                <a href="{{ $language['url'] }}" title="{{ $language['name'] }}" class="button button--small no-defaults uppercase menu-content__language-list__item{{ $active }}">{{ $short_name }}</a>
@endforeach
            </div>
@endif
<?php
$menu = new TimberMenu('main-menu');
$post_type = get_query_var('post_type');
?>
            <nav class="main-navigation" role="navigation">
                <ul class="main-navigation__menu">
@foreach($menu->get_items() as $item)
<?php $is_active = $item->attr_title === '@'.$post_type ? true : ($item->object_id == Loop::id() ? true : false); ?>
                    <li class="main-navigation__menu__item @if($is_active) main-navigation__menu__item--active @endif">
                        <a href="{{ $item->link() }}" class="no-defaults uppercase main-navigation__menu__item--link">{{ $item->name() }}</a>
                    </li>
@endforeach
                </ul>
            </nav>
            <div class="main-navigation__footer">
                <ul class="social-media-list">
<?php $social_media = array('facebook', 'instagram', 'pinterest', 'vimeo'); ?>
@foreach($social_media as $item)
<?php
$key_name = 'social_media_' . $item;
$symbol_name = 'social-' . $item;
?>
                    <li class="social-media-list__item menu-content__item--fadein">
                        <a class="no-defaults social-media-list__item__link" target="_blank" href="{{ $theme_options[$key_name] }}" title="{{ ucwords($item) }}">{{ Macros::symbol($symbol_name, ucwords($item), array('social-media-list__item__symbol')) }}</a>
                    </li>
@endforeach
                </ul>
            </div>
            <div class="menu-content__credits menu-content__item--fadein">
                <p class="menu-content__credits__text heading--light heading--iota lowercase">
                    <a href="https://pixelfordinner.com" target="_blank" class="no-defaults menu-content__credits__link" title="Pixelfordinner">
                        {{ __('Designed &amp; Developed By') }} {{ Macros::symbol('pixelfordinner-logo-symbol-small', 'Pixelfordinner', array('menu-content__credits__logo')) }}
                    </a>
            </div>
        </section>
