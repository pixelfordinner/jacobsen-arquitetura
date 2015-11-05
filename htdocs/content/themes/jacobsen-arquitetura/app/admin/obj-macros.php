<?php

class Macros {
    public static function get_image_path($name) {
        $assets = Application::get('assets');
        return themosis_assets().'/'.$assets['images']['path'].'/'.$name;
    }

    public static function get_symbol_path($id) {
        $assets = Application::get('assets');
        return themosis_assets().'/'.$assets['icons']['path'].'/'.$assets['icons']['files'][0].'#'.$id;
    }
    /**
     * Outputs an <svg> tag that uses a symbol in global svg file
     *
     * @param  string $id The symbol's id to be used
     * @param  string $title The symbol's title, for accessibility
     * @param  array $classes CSS classes to be appended.
     * @return string The html output.
     */
    public static function symbol($id, $title, $classes = null) {
        $classes = is_array($classes) ? ' class="'.implode(' ', $classes).'"' : '';
        $path = self::get_symbol_path($id);
        $title = __($title, Application::get('textdomain'));

        echo '<svg role="img" title="'.$title.'"'.$classes.'><use xlink:href="'.$path.'"></use></svg>';
    }

    /**
     * Checks for Timber library plugin. If not loaded, throws an exception
     */
    protected static function _timberCheck() {
        if (!class_exists('TimberImageHelper') || !class_exists('TimberImage')) {
            throw new Exception('Image resizing relies on the Timber plugin. Please install/activate it.');
        }
    }

    /**
     * Resizes an image (Cropping possible)
     *
     * @param  string $src The image's URL
     * @param  int $w Resized width
     * @param  int $h Resized width
     * @param  string|array $crop Cropping type ([center, center] or [top, center])
     * @param  bool $force Forces resize even if target already exists
     * @return string Resized image URL
     */
    public static function image_resize($src, $w, $h = 0, $crop = 'default', $force = false) {
        self::_timberCheck();

        return TimberImageHelper::resize($src, $w, $h, $crop, $force);
    }

    protected static function _mq_build($img, $selector, $w, $h, $mw, $vertical_align, $hidpi) {
        // Get crop configuration
        $crop = Application::get('cover-image-crop');
        if (in_array($vertical_align, array('top', 'center', 'bottom'))) {
            $crop  = $vertical_align;
        }

        // Do we need a media query ?
        $mq_max_width = $mw ? '(max-width: ' . $w .'px) ' : null;

        // Build the hi-dpi media query
        $mq_hidpi = ($mq_max_width ? $mq_max_width . ' and ' : '') . '(-webkit-min-device-pixel-ratio: 1.5), ';
        $mq_hidpi .= ($mq_max_width ? $mq_max_width . ' and ' : '') . '(min-resolution: 144dpi) ';

        // Get resized image URL
        $img_resized = self::image_resize($img->url, $hidpi ? $w * 2 : $w, $hidpi ? $h * 2 : $h, $crop);

        // Resize image and define content
        $content = 'background-image: url(\'' . $img_resized . '\');';

        if ($hidpi) {
            echo '@media ' . $mq_hidpi . '{ ';
        } else if ($mq_max_width) {
            echo '@media ' . $mq_max_width . '{ ';
        }

        echo '.'.$selector.' { '.$content.' }';

        if ($hidpi || $mq_max_width) {
            echo ' } ';
        }
        echo "\n";
    }

    /**
     * Outputs styles for a responsive cover image
     *
     * @param  string $img The image's URL
     * @param  string $selector Target CSS selector
     * @param  bool $hidpi Output hidpi media query
     * @return
     */
    public static function cover_image_mq($img, $selector, $vertical_align, $hidpi = true) {
        self::_timberCheck();
        $cover_image_sizes = Application::get('cover-image-sizes');
        $hidpi_output = $hidpi ? array(false, true) : array(false);
        $img = new TimberImage($img);

        foreach ($hidpi_output as $is_hidpi) {
            $i = 0;
            foreach ($cover_image_sizes as $dimensions) {
                self::_mq_build($img, $selector,
                    $dimensions['width'], $dimensions['height'],
                    $i > 0, $vertical_align, $is_hidpi);
                ++$i;
            }
        }
    }

    /**
     * Outputs markup for responsive image
     *
     * @param  string $img The image's ID or URL
     * @param  string $size Must match an array entry in application.config.php
     * @param  array $classes Classes to apply to the img element
     * @param  bool $hidpi Output hidpi sizes
     * @return
     */
    public static function responsive_image($img, $size, $classes = array(), $hidpi = true) {
        $mqs = Application::get('responsive-image-mqs');
        $sizes = Application::get('responsive-image-sizes');
        $ratios = Application::get('responsive-image-ratios');

        if (!array_key_exists($size, $mqs) || !array_key_exists($size, $sizes)) {
            throw new Exception('Responsive image size missing from sizes or media queries in app configuration');
        }

        self::_timberCheck();

        $img = new TimberImage($img);
        $sizes = $sizes[$size];

        if ($hidpi === true) {
            $hidpi_sizes = array_map(function($e) { return $e * 2; }, $sizes);
            $sizes = array_unique(array_merge($sizes, $hidpi_sizes), SORT_NUMERIC);
            sort($sizes, SORT_NUMERIC);
        }

        echo '<img sizes="' . $mqs[$size] . '"'."\n";
        echo '     src="' . self::image_resize($img, $sizes[0]) .'"'."\n";
        echo '     srcset="';

        for ($i = 0, $m = count($sizes); $i < $m; $i++) {
            echo self::image_resize($img, $sizes[$i]) . ' ' . $sizes[$i] . 'w' . ($i + 1 < $m ? ",\n" : '');
        }

        echo '"';

        if (count($classes) > 0) {
            echo "\n     class=\"" . implode(' ', $classes) . '"';
        }

        if ($img->get_alt) {
            echo "\n     alt=\"" . $img->get_alt . '"';
        }

        if (array_key_exists($size, $ratios)) {
            echo "\n     width=\"" . $ratios[$size]['width'] . '" height="' . $ratios[$size]['height'] . '"';
        }

        echo ">\n";

    }
}
