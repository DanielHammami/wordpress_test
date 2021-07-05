<?php
/**
 * Bloz functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bloz
 */

if ( ! function_exists( 'bloz_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bloz_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Bloz, use a find and replace
		 * to change 'bloz' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bloz' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		
		add_image_size( 'bloz-home-blog', 400, 300, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' 	=> esc_html__( 'Primary', 'bloz' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'bloz_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_theme_support( 'custom-header', array(
		        'default-image'      => '%s/assets/img/header-image.jpg',
		        'default-text-color' => '000',
		       	'width'              => 1332, /* 16:9 Aspect Ratio */
				'height'             => 749,
		    ) );
	

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	    
    	/*
    	 * This theme styles the visual editor to resemble the theme style,
    	 * specifically font, colors, and column width.
     	 */
    	add_editor_style( array( 'assets/css/editor-style.css', bloz_fonts_url() ) );

		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-font-sizes', array(
		   	array(
		       	'name' => esc_html__( 'small', 'bloz' ),
		       	'shortName' => esc_html__( 'S', 'bloz' ),
		       	'size' => 12,
		       	'slug' => 'small'
		   	),
		   	array(
		       	'name' => esc_html__( 'regular', 'bloz' ),
		       	'shortName' => esc_html__( 'M', 'bloz' ),
		       	'size' => 16,
		       	'slug' => 'regular'
		   	),
		   	array(
		       	'name' => esc_html__( 'larger', 'bloz' ),
		       	'shortName' => esc_html__( 'L', 'bloz' ),
		       	'size' => 36,
		       	'slug' => 'larger'
		   	),
		   	array(
		       	'name' => esc_html__( 'huge', 'bloz' ),
		       	'shortName' => esc_html__( 'XL', 'bloz' ),
		       	'size' => 48,
		       	'slug' => 'huge'
		   	)
		));
		add_theme_support('editor-styles');
		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'bloz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bloz_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bloz_content_width', 900 );
}
add_action( 'after_setup_theme', 'bloz_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bloz_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'bloz' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bloz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Sidebar', 'bloz' ),
		'id'            => 'front-page-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'bloz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	for ( $i=1; $i <= 4; $i++ ) { 
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area ', 'bloz' )  . $i,
			'id'            => 'footer-' . $i,
			'description'   => esc_html__( 'Add widgets here.', 'bloz' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'bloz_widgets_init' );

/**
 * Register custom fonts.
 */
function bloz_fonts_url() {
	$fonts_url = '';

	$font_families = array();
	
	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Montserrat, translate this to 'off'. Do not translate
	 * into your own language.
	 */

	$lato_sans = _x( 'on', 'Lora font: on or off', 'bloz' );

	if ( 'off' !== $lato_sans ) {
		$font_families[] = 'Lora:0,400,1,500';
	}


	$mulish_sans = _x( 'on', 'Philosopher font: on or off', 'bloz' );

	if ( 'off' !== $mulish_sans ) {
		$font_families[] = 'Philosopher:400,700';
	}

	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function bloz_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'bloz-fonts', bloz_fonts_url(), array(), null );

	//slick.css
	wp_enqueue_style( 'slick', get_theme_file_uri() . '/assets/css/slick.css', '', '1.8.0' );

	//slick-theme.css
	wp_enqueue_style( 'slick-theme', get_theme_file_uri() . '/assets/css/slick-theme.css', '', '1.8.0' );

	//font-awesome.css
	wp_enqueue_style( 'font-awesome', get_theme_file_uri() . '/assets/css/font-awesome.css', '', '4.7.0' );

	// blocks
	wp_enqueue_style( 'bloz-blocks', get_template_directory_uri() . '/assets/css/blocks.css' );

	wp_enqueue_style( 'bloz-style', get_stylesheet_uri() );

	//imagesloaded.js
	wp_enqueue_script( 'imagesloaded' );

	//slick.js
	wp_enqueue_script( 'slick-jquery', get_theme_file_uri( '/assets/js/slick.js' ), array( 'jquery' ), '20151215', true );

	//packery.pkgd.js
	wp_enqueue_script( 'packery-pkgd', get_theme_file_uri( '/assets/js/packery.pkgd.js' ), array( 'jquery' ), '20151215', true );

	//theia-sticky-sidebar.js
	wp_enqueue_script( 'theia-sticky', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'bloz-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array(), '20151215', true );

	wp_enqueue_script( 'bloz-skip-link-focus-fix', get_theme_file_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'bloz-custom', get_theme_file_uri( '/assets/js/custom.js' ), array( 'jquery' ), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bloz_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 *
 * @since bloz 1.0.0
 */
function bloz_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'bloz-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'bloz-fonts', bloz_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'bloz_block_editor_styles' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

/**
 * Breadcrumb trail class.
 */
require get_parent_theme_file_path( '/inc/class-breadcrumb-trail.php' );


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_parent_theme_file_path() . '/inc/jetpack.php';
}

/**
 * Metabox
 */
require get_parent_theme_file_path( '/inc/metabox.php' );

require get_parent_theme_file_path( '/inc/widgets/widgets.php' );


/**
 * TGMPA call
 */
require get_parent_theme_file_path( '/inc/tgmpa/call.php' );

require get_parent_theme_file_path( '/inc/custom-style.php' );

/**
 * Enqueue admin css.
 * @return [type] [description]
 */
function bloz_load_custom_wp_admin_style( $hook ) {

    wp_register_style( 'bloz-admin', get_theme_file_uri( 'assets/css/bloz-admin.css' ), false, '1.0.0' );
    wp_enqueue_style( 'bloz-admin' );
}
add_action( 'admin_enqueue_scripts', 'bloz_load_custom_wp_admin_style' );

/**
 *
 * Reset all setting to default.
 *
 */
function bloz_reset_settings() {
    $reset_settings = get_theme_mod( 'bloz_reset_settings', false );
    if ( $reset_settings ) {
        remove_theme_mods();
    }
}
add_action( 'customize_save_after', 'bloz_reset_settings' );


if ( ! function_exists( 'bloz_exclude_sticky_posts' ) ) {
    function bloz_exclude_sticky_posts( $query ) {
        if ( ! is_admin() && $query->is_main_query() && $query->is_home() ) {
            $sticky_posts = get_option( 'sticky_posts' );  
            if ( ! empty( $sticky_posts ) ) {
            	$query->set('post__not_in', $sticky_posts );
            }
            $query->set('ignore_sticky_posts', true );
        }
    }
}
add_action( 'pre_get_posts', 'bloz_exclude_sticky_posts' );

