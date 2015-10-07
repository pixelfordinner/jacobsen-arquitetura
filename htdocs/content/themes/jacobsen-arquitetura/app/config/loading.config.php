<?php

return array(

    /**
     * Mapping for all classes without a namespace.
     * The key is the class name and the value is the
     * absolute path to your class file.
     *
     * Watch your commas...
     */
    // Controllers
    'BaseController'        => themosis_path('app').'controllers'.DS.'BaseController.php',
    'ProjectController'     => themosis_path('app').'controllers'.DS.'ProjectController.php',
    'MediaController'     => themosis_path('app').'controllers'.DS.'MediaController.php',
    'StyleguideController'  => themosis_path('app').'controllers'.DS.'StyleguideController.php',

    // Models
    'PostModel'             => themosis_path('app').'models'.DS.'PostModel.php',

    // Miscellaneous

);
