<?php

 Action::add('pre_get_posts', 'ProjectController');

 add_action('acf/init', function () {
     acf_update_setting('google_api_key', 'AIzaSyDn2-8djSEe3QYLURqcIFY27rqTD3AWMpI');
 });
