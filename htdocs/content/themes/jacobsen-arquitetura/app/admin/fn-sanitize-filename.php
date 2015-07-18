<?php

// Adapted from https://wordpress.org/plugins/wp-image-utils/

function remove_special_chars($string) {
    $special_chars = array(
        "?", "[", "]", "/", "\\", "=", "<", ">", ":", ";", ",", "'", "\"", "&",
        "$", "#", "*", "(", ")", "|", "~", "`", "!", "{", "}", chr( 0 )
    );

    $special_chars = apply_filters('sanitize_file_name_chars', $special_chars, $string);
    $string = str_replace($special_chars, '', $string);
    $string = preg_replace('/\+/', '', $string);

    return $string;
}

add_filter( 'sanitize_file_name', function($filename, $datetime = null) {
    $file_info = pathinfo($filename);
    $file_extension = empty($file_info['extension']) ? '' : '.'.$file_info['extension'];

    $sanitized_file_name = basename($filename, $file_extension);
    $sanitized_file_name = remove_accents($sanitized_file_name);
    $sanitized_file_name = remove_special_chars($sanitized_file_name);
    $sanitized_file_name = preg_replace('/[[:^print:]]/', '', $sanitized_file_name);
    $sanitized_file_name = strtolower($sanitized_file_name);

    return $sanitized_file_name.$file_extension;
}, 10 );
