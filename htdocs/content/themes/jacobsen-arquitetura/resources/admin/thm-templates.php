<?php

// Source: https://github.com/mvpdesign/themosis-theme/blob/master/app/admin/acf.php

// add themosis templates
add_filter('acf/location/rule_values/page_template', 'addThemosisTemplates');
function addThemosisTemplates($choices)
{
    $key = 'theme';
    $configFile = 'templates';
    $configTemplates = include(themosis_path($key).'config'.DS.$configFile.'.config.php');
    $templates = array();
    foreach ($configTemplates as $configTemplate) {
        $prettyTemplateName = str_replace(array('-', '_'), ' ', ucfirst(trim($configTemplate)));
        $templates[$configTemplate] = $prettyTemplateName;
    }
    return array_merge(array('none' => __('- None -')), $templates);
}
// get themosis templates
add_filter('acf/location/rule_match/page_template', 'getThemosisTemplate', 11, 3);
function getThemosisTemplate($match, $rule, $options)
{
    // vars
    $page_template = $options['page_template'];
    // get page template
    if (! $page_template && $options['post_id']) {
        $page_template = get_post_meta($options['post_id'], '_themosisPageTemplate', true);
    }
    // compare
    if ($rule['operator'] == "==") {
        $match = ( $page_template === $rule['value'] );
    } elseif ($rule['operator'] == "!=") {
        $match = ( $page_template !== $rule['value'] );
    }
    // return
    return $match;
}
add_filter('acf/location/rule_values/options_page', 'acfCustomOptionRuleValues');
function acfCustomOptionRuleValues($choices)
{
    // vars
    $pages = acf_get_options_pages();
    // populate
    if (! empty($pages)) {
        foreach ($pages as $page) {
            $choices[ $page['menu_slug'] ] = $page['page_title'];
        }
    } else {
        $choices[''] = __('No options pages exist', 'acf');
    }
    // return
    return $choices;
}
add_action('admin_head', 'acfResuableFieldGroupStyles');
function acfResuableFieldGroupStyles()
{
    ?>
    <style type="text/css">
        .acf-field-reusable-field-group > .acf-input {
            margin-left: 20px;
        }
    </style>
    <?php
}
