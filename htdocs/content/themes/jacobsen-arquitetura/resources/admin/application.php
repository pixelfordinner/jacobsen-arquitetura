<?php

// Typekit CSS retrieval from cookie.
// if (array_key_exists('_fonts_typekit_url', $_COOKIE)) {
//     add_action('wp_enqueue_scripts', function() {
//         $typekitUrl = strip_tags($_COOKIE['_fonts_typekit_url']);
//         wp_enqueue_style('typekit-styles', $typekitUrl, array(), '', 'all');
//     });
// }

// Append font classes to root element
function font_classes() {
    $classes = Config::get('application.font-classes');

    if (array_key_exists('_fonts_typekit_url', $_COOKIE)) {
        echo ' '.$classes['body'];
    }

    if (array_key_exists('_fonts_self_loaded', $_COOKIE)) {
        echo ' '.$classes['headings'];
    }
}

// Append detected browser features to root element
function browser_features_classes() {
    $features = Config::get('application.browser-features');
    $features_classes = Config::get('application.browser-features-classes');
    $class_prefix = $features_classes['prefix'];
    $cookie_prefix = '_feat_';
    $classes = '';

    foreach ($features as $feature) {
        if (array_key_exists($cookie_prefix.$feature, $_COOKIE)) {
            $classes .= ' '.$class_prefix.($_COOKIE[$cookie_prefix.$feature] === 'true' ? '' : 'no-').$feature;
        } else {
            return;
        }
    }

    echo $classes;

    View::share('_browser_features', true);
}

// Share screen breakpoint information with all views.
View::share('_screen_breakpoints', Config::get('application.screen-breakpoints'));

// Assets
$assets = Config::get('application.assets');

if (is_array($assets)) {
    // Make asset configuration available for all views
    View::share('assets', $assets);

    if (array_key_exists('icons', $assets)) {
        // Create a shortcut for symbols for all views
        View::share('icons-path', $assets['icons']['path'].'/'.$assets['icons']['files'][0]);
    }

    // Styles
    if (array_key_exists('styles', $assets) &&
        array_key_exists('files', $assets['styles'])) {
        $styles = $assets['styles'];
        $files = $styles['files'];

        foreach ($files as $file) {
            Asset::add(
                $file['handle'],
                $styles['path'].'/'.$file['src'],
                $file['deps'],
                $file['ver'],
                $file['media']
            );
        }
    }

    // Scripts
    if (array_key_exists('scripts', $assets) &&
        array_key_exists('files', $assets['scripts'])) {
        $scripts = $assets['scripts'];
        $files = $scripts['files'];

        foreach ($files as $file) {

            if (array_key_exists('extra', $file) &&
                $file['extra'] === 'async' ||
                $file['extra'] === 'defer') {
                $extra = $file['extra'];
            } else {
                $extra = false;
            }

            Asset::add(
                $file['handle'],
                $scripts['path'].'/'.$file['src'],
                $file['deps'],
                $file['ver'].($extra ? '#'.$extra : ''),
                $file['in_footer']
            );
        }
    }

}

// DNS prefetch

add_action('wp_head', function() {
    $dnsPrefetch = Config::get('application.dns-prefetch');

    if (getenv('WP_CDN')) {
        $dnsPrefetch[] = '//' . parse_url(getenv('WP_CDN'), PHP_URL_HOST);
    }

    if (is_array($dnsPrefetch)) {
        foreach ($dnsPrefetch as $dns) {
            echo '<link ref="dns-prefetch" href="'.$dns.'">'."\n";
        }
    }
}, 0);

// Limit global number of revisions.

if (is_int(Config::get('application.revisions'))) {
    add_filter('wp_revisions_to_keep', function($num, $post) {
        return Config::get('application.revisions');
    }, 10,2);
}

// Register

add_action('after_setup_theme', 'register_intl');
function register_intl(){
    load_theme_textdomain(Config::get('application.textdomain'), get_template_directory() . '/languages');
}

