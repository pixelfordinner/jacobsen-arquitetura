<?php

if ( ! empty ( $GLOBALS['sitepress'] ) ) {
    add_action( 'wp_head', function()
    {
        remove_action(
            current_filter(),
            array ( $GLOBALS['sitepress'], 'meta_generator_tag' )
        );
    },
    0
    );
}
