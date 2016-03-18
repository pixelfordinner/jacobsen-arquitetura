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
    // Theme class aliases
    /* --------------------------------------------------------------- */
    'aliases'       => [
        'Action'        => 'Themosis\\Facades\\Action',
        'Ajax'          => 'Themosis\\Facades\\Ajax',
        'Asset'         => 'Themosis\\Facades\\Asset',
        'Config'        => 'Themosis\\Facades\\Config',
        'Controller'    => 'Themosis\\Route\\Controller',
        'Field'         => 'Themosis\\Facades\\Field',
        'Form'          => 'Themosis\\Facades\\Form',
        'Html'          => 'Themosis\\Facades\\Html',
        'Input'         => 'Themosis\\Facades\\Input',
        'Meta'          => 'Themosis\\Metabox\\Meta',
        'Metabox'       => 'Themosis\\Facades\\Metabox',
        'Option'        => 'Themosis\\Page\\Option',
        'Page'          => 'Themosis\\Facades\\Page',
        'PostType'      => 'Themosis\\Facades\\PostType',
        'Route'         => 'Themosis\\Facades\\Route',
        'Section'       => 'Themosis\\Facades\\Section',
        'Session'       => 'Themosis\\Session\\Session',
        'TaxField'      => 'Themosis\\Taxonomy\\TaxField',
        'TaxMeta'       => 'Themosis\\Taxonomy\\TaxMeta',
        'Taxonomy'      => 'Themosis\\Facades\\Taxonomy',
        'User'          => 'Themosis\\Facades\\User',
        'Validator'     => 'Themosis\\Facades\\Validator',
        'Loop'          => 'Themosis\\Facades\\Loop',
        'View'          => 'Themosis\\Facades\\View'
    ],
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
                    'extra'                    => 'async' // Extra can be async|defer|false
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
        '//use.typekit.net',
        '//maps.googleapis.com',
        '//maps.gstatic.com',
        '//fonts.gstatic.com'
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
    'cover-image-crop'                         => 'default',
    /*-----------------------------------------------------------------------------------------*/
    // Responsive images sizes and media query
    /*-----------------------------------------------------------------------------------------*/
    'responsive-image-sizes'                   => array(
        'fullwidth_image'                      => array(320, 480, 640, 800, 1024, 1344),
        'halfwidth_images'                     => array(320, 480, 640, 672),
        'project_thumbnails'                   => array(320, 480),
        'media_thumbnails'                     => array(320, 432)
    ),
    'responsive-image-mqs'                     => array(
        'fullwidth_image'                      => '(min-width: 1344px) 1344px, 100vw',
        'halfwidth_images'                     => '(min-width: 1344px) 672px, (min-width: 640px) 50vw, 100vw',
        'project_thumbnails'                   => '(min-width: 1920px) 25vw, (min-width: 1440px) 33.3333vw, (min-width: 960px) 50vw, 100vw',
        'media_thumbnails'                     => '(min-width: 1920px) calc(25vw - 4.5rem), (min-width: 1440px) 33.3333vw, (min-width: 960px) 50vw, 100vw'
    ),
    'responsive-image-ratios'                  => array(
        'project_thumbnails'                   => array('width' => 480, 'height' => 320)
    ),
    /*-----------------------------------------------------------------------------------------*/
    // Limit global number of revisions.
    /*-----------------------------------------------------------------------------------------*/
    'revisions'                                => 5
);
