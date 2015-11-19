<?php

if (has_filter('wpml_active_languages')) {
    $languages = apply_filters('wpml_active_languages', NULL, array('skip_missing' => 0, 'link_empty_to' => '/'));
    $output = array();

    if(!empty($languages)) {
        foreach($languages as $language){
            $short_name = strpos($language['language_code'], '-') !== false ? current(explode('-', $language['language_code'], -1)) : $language['language_code'];
            $output[$short_name] = array(
                'url' => $language['url'],
                'active' => (bool)$language['active'],
                'name' => $language['native_name']
            );
        }
    }

    View::share('languages', $output);
}
