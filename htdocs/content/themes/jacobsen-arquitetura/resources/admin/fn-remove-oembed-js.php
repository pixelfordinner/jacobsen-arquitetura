<?php

// Removes wp-embed.js from Front pages

remove_action('wp_head', 'wp_oembed_add_host_js');
