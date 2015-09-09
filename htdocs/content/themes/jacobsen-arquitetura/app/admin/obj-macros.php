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
        $classes = is_array($classes) ? ' class="'.implode(', ', $classes).'"' : '';
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

    protected static function _mq_build($img, $selector, $w, $h, $mw, $hidpi) {
        // Get crop configuration
        $crop = Application::get('cover-image-crop');

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
    public static function cover_image_mq($img, $selector, $hidpi = true) {
        self::_timberCheck();
        $cover_image_sizes = Application::get('cover-image-sizes');
        $hidpi_output = $hidpi ? array(false, true) : array(false);
        $img = new TimberImage($img);

        foreach ($hidpi_output as $is_hidpi) {
            $i = 0;
            foreach ($cover_image_sizes as $dimensions) {
                self::_mq_build($img, $selector,
                    $dimensions['width'], $dimensions['height'],
                    $i > 0, $is_hidpi);
                ++$i;
            }
        }
    }
}
