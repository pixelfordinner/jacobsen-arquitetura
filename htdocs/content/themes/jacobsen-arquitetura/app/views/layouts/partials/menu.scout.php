        <button class="button uppercase menu-toggle menu--fixed" data-menu-toggle>
            <span class="button__symbol">
                <span class="menu-toggle__symbol--left"></span>
                <span class="menu-toggle__symbol--right"></span>
            </span>{{ __('Menu', Application::get('textdomain')) }}
        </button>
        <section class="menu-content" data-menu-content data-menu-content-anim-duration="500">
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
        </section>
