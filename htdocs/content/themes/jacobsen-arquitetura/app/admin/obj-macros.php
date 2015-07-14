<?php

class Macro {
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
        $assets = Application::get('assets');
        $path = themosis_assets().'/'.$assets['icons']['path'].'/'.$assets['icons']['files'][0];
        $title = __($title, Application::get('textdomain'));

        echo '<svg role="img" title="'.$title.'"'.$classes.'><use xlink:href="'.$path.'#'.$id.'"></use></svg>';
    }

}
