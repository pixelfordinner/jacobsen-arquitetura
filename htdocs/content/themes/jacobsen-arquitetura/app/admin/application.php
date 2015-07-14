<?php

// Typekit CSS retrieval from cookie.
if (array_key_exists('_fonts_typekit_url', $_COOKIE)) {
    add_action('wp_enqueue_scripts', function() {
        $typekitUrl = strip_tags($_COOKIE['_fonts_typekit_url']);
        wp_enqueue_style('typekit-styles', $typekitUrl, array(), '', 'all');
    });
}

function font_classes() {
    $classes = Application::get('font-classes');

    if (array_key_exists('_fonts_typekit_url', $_COOKIE)) {
        echo ' '.$classes['body'];
    }

    if (array_key_exists('_fonts_self_loaded', $_COOKIE)) {
        echo ' '.$classes['headings'];
    }
}

// Assets
$assets = Application::get('assets');

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
    $dnsPrefetch = Application::get('dns-prefetch');

    if (is_array($dnsPrefetch)) {
        foreach ($dnsPrefetch as $dns) {
            echo '<link ref="dns-prefetch" href="'.$dns.'">'."\n";
        }
    }
}, 0);

// Limit global number of revisions.

if (is_int(Application::get('revisions'))) {
    add_filter('wp_revisions_to_keep', function($num, $post) {
        return Application::get('revisions');
    }, 10,2);
}
