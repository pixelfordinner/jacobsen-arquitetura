<?php

return array(

	/*
	* Edit this file in order to configure your application
	* settings or preferences.
	*
	*/

	/* --------------------------------------------------------------- */
	// Application textdomain
	/* --------------------------------------------------------------- */
	'textdomain'                               => 'jarquitetura',

	/* --------------------------------------------------------------- */
	// Global Javascript namespace of your application
	/* --------------------------------------------------------------- */
	'namespace'                                => 'jarquitetura',

	/* --------------------------------------------------------------- */
	// Set WordPress admin ajax file without the PHP extension
	/* --------------------------------------------------------------- */
	'ajaxurl'                                  => 'admin-ajax',

	/* --------------------------------------------------------------- */
	// Encoding
	/* --------------------------------------------------------------- */
	'encoding'                                 => 'UTF-8',

	/* --------------------------------------------------------------- */
	// Cleanup Header
	/* --------------------------------------------------------------- */
	'cleanup'                                  => true,

	/* --------------------------------------------------------------- */
	// Restrict access to the WordPress Admin for users with a
	// specific role.
	// Once the theme is activated, you can only log in by going
	// to 'wp-login.php' or 'login' (if permalinks changed) urls.
	// By default, allows 'administrator', 'editor', 'author',
	// 'contributor' and 'subscriber' to access the ADMIN area.
	// Edit this configuration in order to limit access.
	/* --------------------------------------------------------------- */
	'access'                                   => array(
		'administrator',
		'editor',
		'author',
		'contributor'
	),

	/* --------------------------------------------------------------- */
	// Application classes' alias
	/* --------------------------------------------------------------- */
	'aliases'                                  => array(
		'Themosis\\Ajax\\Ajax'                 => 'Ajax',
		'Themosis\\Facades\\Asset'             => 'Asset',
		'Themosis\\Configuration\\Application' => 'Application',
		'Themosis\\Route\\Controller'          => 'Controller',
		'Themosis\\Facades\\Field'             => 'Field',
		'Themosis\\Facades\\Form'              => 'Form',
		'Themosis\\Facades\\Html'              => 'Html',
		'Themosis\\Facades\\Input'             => 'Input',
		'Themosis\\Metabox\\Meta'              => 'Meta',
		'Themosis\\Facades\\Metabox'           => 'Metabox',
		'Themosis\\Page\\Option'               => 'Option',
		'Themosis\\Facades\\Page'              => 'Page',
		'Themosis\\Facades\\PostType'          => 'PostType',
		'Themosis\\Facades\\Route'             => 'Route',
		'Themosis\\Facades\\Section'           => 'Section',
		'Themosis\\Session\\Session'           => 'Session',
		'Themosis\\Taxonomy\\TaxField'         => 'TaxField',
		'Themosis\\Taxonomy\\TaxMeta'          => 'TaxMeta',
		'Themosis\\Facades\\Taxonomy'          => 'Taxonomy',
		'Themosis\\Facades\\User'              => 'User',
		'Themosis\\Facades\\Validator'         => 'Validator',
		'Themosis\\Facades\\Loop'              => 'Loop',
		'Themosis\\Facades\\View'              => 'View'
	),
    /* --------------------------------------------------------------- */
    // Advanced application assets paths and filenames
    /* --------------------------------------------------------------- */
    'assets'                                   => array(
        'styles'                               => array(
            'path'                             => getenv('TH_ASSET_BASE') . '/styles',
            'files'                            => array(
                array(
                    'handle'                   => 'theme-styles',
                    'src'                      => 'main.css',
                    'deps'                     => array(),
                    'ver'                      => '1.0',
                    'media'                    => 'screen'
                )
            )
        ),
        'scripts'                              => array(
            'path'                             => getenv('TH_ASSET_BASE') . '/scripts',
            'files'                            => array(
                array(
                    'handle'                   => 'theme-scripts',
                    'src'                      => 'bundle.js',
                    'deps'                     => array(),
                    'ver'                      => '1.0',
                    'in_footer'                => true,
                    // Extra can be async|defer|false
                    'extra'                    => 'async'
                )
            )
        ),
        'images'                               => array(
            'path'                             => getenv('TH_ASSET_BASE') . '/images'
        ),
        'icons'                                => array(
            'path'                             => getenv('TH_ASSET_BASE') . '/icons',
            'files'                            => array('symbols.svg')
        ),
        'fonts'                                => array(
            'path'                             => getenv('TH_ASSET_BASE') . '/fonts'
        ),
        'favicons'                             => array(
            'path'                             => getenv('TH_ASSET_BASE') . '/favicons'
        )
    ),
    /*-----------------------------------------------------------------------------------------*/
    // DNS Prefetch
    /*-----------------------------------------------------------------------------------------*/
    'dns-prefetch'                             => array(
        '//use.typekit.net'
    ),
    /*-----------------------------------------------------------------------------------------*/
    // Font-related class names
    /*-----------------------------------------------------------------------------------------*/
    'font-classes'                             => array(
        'body'                                 => 'type__body--available',
        'headings'                             => 'type__heading--available'
    ),
    /*-----------------------------------------------------------------------------------------*/
    // Browser features
    /*-----------------------------------------------------------------------------------------*/
    'browser-features'                         => array('js', 'touch', 'flexbox', 'cssremunit'),
    /*-----------------------------------------------------------------------------------------*/
    // Browser features class names
    /*-----------------------------------------------------------------------------------------*/
    'browser-features-classes'                 => array(
        'prefix'                               =>  'feat--'
    ),
    /*-----------------------------------------------------------------------------------------*/
    // Screen breakpoints
    /*-----------------------------------------------------------------------------------------*/
    'screen-breakpoints'                       => array(
      'mobile'                                 => 0,
      'tablet'                                 => 640,
      'tablet-large'                           => 800,
      'desktop'                                => 1024,
      'desktop-large'                          => 1600
    ),
    /*-----------------------------------------------------------------------------------------*/
    // Cover image sizes
    /*-----------------------------------------------------------------------------------------*/
    'cover-image-sizes'                        => array(
        array(
            'width'                            => 1920,
            'height'                           => 1080
        ),
        array(
            'width'                            => 1600,
            'height'                           => 900
        ),
        array(
            'width'                            => 1280,
            'height'                           => 720
        ),
        array(
            'width'                            => 1024,
            'height'                           => 768
        ),
        array(
            'width'                            => 768,
            'height'                           => 1024
        ),
        array(
            'width'                            => 480,
            'height'                           => 852
        ),
        array(
            'width'                            => 320,
            'height'                           => 568
        ),
    ),
    /*-----------------------------------------------------------------------------------------*/
    // Cover image crop configuration
    /*-----------------------------------------------------------------------------------------*/
    'cover-image-crop'                         => array('center', 'top'),
    /*-----------------------------------------------------------------------------------------*/
    // Responsive images sizes and media query
    /*-----------------------------------------------------------------------------------------*/
    'responsive-image-sizes'                   => array(
        'fullwidth_image'                      => array(320, 480, 640, 800, 1024, 1344),
        'halfwidth_images'                     => array(320, 480, 640, 672)
    ),
    'responsive-image-mqs'                     => array(
        'fullwidth_image'                      => '(min-width: 1344px) 1344px, 100vw',
        'halfwidth_images'                     => '(min-width: 1344px) 672px, (min-width: 640px) 50vw, 100vw    '
    ),
    /*-----------------------------------------------------------------------------------------*/
    // Limit global number of revisions.
    /*-----------------------------------------------------------------------------------------*/
    'revisions'                                => 5
);
