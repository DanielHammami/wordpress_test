<?php

if ( ! function_exists( 'wp_body_open' ) ) {

	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 */
		do_action( 'wp_body_open' );
	}
}

// Global variables define
define('SPASALON_TEMPLATE_DIR_URI' , get_template_directory_uri() );
define('SPASALON_TEMPLATE_DIR' , get_template_directory() );
define('SPASALON_THEME_FUNCTIONS_PATH' , SPASALON_TEMPLATE_DIR.'/functions');

// Theme functions file including
require( SPASALON_THEME_FUNCTIONS_PATH . '/customizer/customizer-pro-feature.php');
require( SPASALON_THEME_FUNCTIONS_PATH . '/spasalon_default_data.php');
require( SPASALON_THEME_FUNCTIONS_PATH . '/scripts/script.php');
require( SPASALON_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php');
require( SPASALON_THEME_FUNCTIONS_PATH . '/menu/spasalon_nav_walker.php');
require( SPASALON_THEME_FUNCTIONS_PATH . '/widget/sidebars.php');
require( SPASALON_THEME_FUNCTIONS_PATH . '/customizer/banner-settings.php');
require( SPASALON_THEME_FUNCTIONS_PATH . '/customizer/general-settings.php');
require( SPASALON_THEME_FUNCTIONS_PATH . '/customizer/home-page.php');
require( SPASALON_THEME_FUNCTIONS_PATH . '/class-tgm-plugin-activation.php');

require( SPASALON_THEME_FUNCTIONS_PATH . '/customizer/customizer.php');
require( SPASALON_THEME_FUNCTIONS_PATH . '/customizer/customizer_recommended_plugin.php');
require( SPASALON_THEME_FUNCTIONS_PATH . '/font/font.php');
require( SPASALON_THEME_FUNCTIONS_PATH . '/meta-box/metabox.php');
require( SPASALON_THEME_FUNCTIONS_PATH . '/template-tag.php');
require( SPASALON_THEME_FUNCTIONS_PATH . '/widget/wbr-register-page-widget.php');
require( SPASALON_THEME_FUNCTIONS_PATH . '/widget/wbr-news-widget.php');
require( SPASALON_THEME_FUNCTIONS_PATH . '/widget/post-widget.php');
// Spasalon Info Page
//require( SPASALON_THEME_FUNCTIONS_PATH . '/spasalon-info/welcome-screen.php');

function spasalon_customizer_css() {
	wp_enqueue_style( 'spasalon-customizer-info', SPASALON_TEMPLATE_DIR_URI . '/css/pro-feature.css' );
}
add_action( 'admin_init', 'spasalon_customizer_css' );

if ( ! function_exists( 'spasalon_setup' ) ) :

function spasalon_setup() {
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	
	load_theme_textdomain( 'spasalon', get_template_directory() . '/languages' );	
	// Add default posts and comments RSS feed links to head.	
	add_theme_support( 'automatic-feed-links' );	
	/*
	 * Let WordPress manage the document title.
	 */
	 
	add_theme_support( 'title-tag' );	
	// supports featured image
	
	add_theme_support( 'post-thumbnails' );	
	// This theme uses wp_nav_menu() in two locations.	
	register_nav_menus( array(
	
		'primary' => esc_html__( 'Primary Menu', 'spasalon' ),		
		'footer'  => esc_html__( 'Footer Menu', 'spasalon' ),
		
	) );	
	// woocommerce support	
	add_theme_support( 'woocommerce' );	
	// Woocommerce Gallery Support
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );	
	//Custom logo	
	add_theme_support( 'custom-logo' , array(
	
	   'class'       => 'navbar-brand',	   
	   'width'       => 150,	   
	   'height'      => 35,	   
	   'flex-width' => true,	   
	   'flex-height' => false,
	   'header-text' => array( 'site-title', 'site-description' ),
	   
	) );
	add_editor_style();
	$spasalon_theme = wp_get_theme(); // gets the current theme
	if ( 'Spasalon' == $spasalon_theme->name )
	{
	 	if ( is_admin() ) {
			require SPASALON_TEMPLATE_DIR . '/admin/admin-init.php';
		}
	}
}
endif; // spasalon_setup
add_action( 'after_setup_theme', 'spasalon_setup' );


// Replace logo Anchor class
add_filter('get_custom_logo', 'spasalon_custom_logo_output', 10);
function spasalon_custom_logo_output( $spasalon_html ){	
	$spasalon_html = str_replace( 'custom-logo-link', 'navbar-brand', $spasalon_html );	
	return $spasalon_html;
}

// excerpt length
function spasalon_excerpt_length( $length ) {
	return 20;	
}
add_filter( 'excerpt_length', 'spasalon_excerpt_length', 999 );


function spasalon_inline_style() {
	$spasalon_custom_css= '';	
	$spasalon_current_options = wp_parse_args(  get_option( 'spa_theme_options'));
	$spasalon_service_content = ! empty($spasalon_current_options['spasalon_service_content']) ? $spasalon_current_options['spasalon_service_content'] : json_encode(
			array(
				array(
					'color'      => '#f22853',
				),
				array(
					'color'      => '#00bcd4',
				),
				array(
					'color'      => '#fe8000',
				),
				array(
					'color'      => '#1abac8',
				),
			)
		);
	
	if ( ! empty( $spasalon_service_content ) ) {
		$spasalon_service_content = json_decode( $spasalon_service_content );
		
		foreach ( $spasalon_service_content as $spasalon_key => $spasalon_service_item ) {
			$spasalon_box_nb = $spasalon_key + 1;
			if ( ! empty( $spasalon_service_item->color ) ) {
				
				$spasalon_color = ! empty( $spasalon_service_item->color ) ? apply_filters( 'spasalon_translate_single_string', $spasalon_service_item->color, 'searvice section' ) : '';
				
				$spasalon_custom_css .= '.service-box:nth-child(' . esc_attr( $spasalon_box_nb ) . ') .service-icon i {
                            background-color: ' . esc_attr( $spasalon_color ) . ';
				}';
				
				
			}
		}
	}
	wp_add_inline_style( 'style', $spasalon_custom_css );
}

add_action( 'wp_enqueue_scripts', 'spasalon_inline_style' );

// Replaces the excerpt "more" text by a link
function spasalon_new_excerpt_more($more) {	
    global $post;	
	$spasalon_link = sprintf( '<p><a href="%1$s" class="more-link">%2$s</a></p>',
					esc_url( get_permalink( get_the_ID() ) ),		
					sprintf( esc_html__( 'Read More' , 'spasalon' ) )
		
	);
	return ' &hellip; ' . $spasalon_link;	
}
add_filter('excerpt_more', 'spasalon_new_excerpt_more');

function spasalon_modify_read_more_link() {
	
	global $post;	
	$spasalon_link = '<a class="more-link" href="'.esc_url(get_permalink()).'">'.esc_html__( 'Read More' , 'spasalon' ).'</a>';	
    return $spasalon_link;
}
add_filter( 'the_content_more_link', 'spasalon_modify_read_more_link' );

// content width
function spasalon_content_width() {	
	$GLOBALS['content_width'] = apply_filters( 'spasalon_content_width', 960 );
}
add_action( 'after_setup_theme', 'spasalon_content_width', 0 );


// custom css 
function spasalon_custom_css_function(){
	
	$spasalon_current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), spasalon_default_data() );
	echo '<style>';
	echo esc_html($spasalon_current_options['spa_custom_css']);
	echo '</style>';	
	}
add_action('wp_head','spasalon_custom_css_function');

the_tags();

add_action('admin_head', 'spasalon_remove_wiget');
function spasalon_remove_wiget() {
  echo '<style>
#sidebar-service {
    display: none !important;
}
</style>';
}

add_action( 'tgmpa_register', 'spasalon_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function spasalon_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$spasalon_plugins = array(
	// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
            'name' => esc_html__('Contact Form 7', 'spasalon'),
            'slug' => 'contact-form-7',
            'required' => false,
        ),
		array(
           'name' => esc_html__('Webriti Companion', 'spasalon'),
            'slug' => 'webriti-companion',
            'required' => false,
        )
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$spasalon_config = array(
		'id'           => 'spasalon',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $spasalon_plugins, $spasalon_config );
}

//Custom CSS compatibility
$spasalon_options = spasalon_default_data();
$spasalon_current_options = wp_parse_args(get_option('spa_theme_options', array()), $spasalon_options);
if ($spasalon_current_options['spa_custom_css'] != '' && $spasalon_current_options['spa_custom_css'] != 'nomorenow') {
    $spasalon_css = '';
    $spasalon_css .= $spasalon_current_options['spa_custom_css'];
    $spasalon_css .= (string) wp_get_custom_css(get_stylesheet());
    $spasalon_current_options['spa_custom_css'] = 'nomorenow';
    update_option('spa_theme_options', $spasalon_current_options);
    wp_update_custom_css_post($spasalon_css, array());
}
?>