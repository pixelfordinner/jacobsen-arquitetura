<?php

// Assets
$assets = Application::get('assets');

if (is_array($assets)) {
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
