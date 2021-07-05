<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Chia Lite
 * @since Chia Lite 1.0
 */

// This theme requires WordPress 5.3 or later.
if ( version_compare( $GLOBALS['wp_version'], '5.3', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'chia_lite_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Chia Lite 1.0
	 *
	 * @return void
	 */
	function chia_lite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Chia Lite, use a find and replace
		 * to change 'chia-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'chia-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'chia-lite' ),
				'footer'  => esc_html__( 'Secondary menu', 'chia-lite' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 350;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		$editor_stylesheet_path = './assets/css/style-editor.css';

		// Enqueue editor styles.
		add_editor_style( $editor_stylesheet_path );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Extra small', 'chia-lite' ),
					'shortName' => esc_html_x( 'XS', 'Font size', 'chia-lite' ),
					'size'      => 16,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'chia-lite' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'chia-lite' ),
					'size'      => 18,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'chia-lite' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'chia-lite' ),
					'size'      => 20,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'chia-lite' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'chia-lite' ),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'chia-lite' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'chia-lite' ),
					'size'      => 40,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'chia-lite' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'chia-lite' ),
					'size'      => 80,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'chia-lite' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'chia-lite' ),
					'size'      => 144,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffc4ad',
			)
		);

		// Editor color palette.
		$black       = '#000000';
		$dark_green  = '#0E3D35';
		$main_green  = '#14564b';
		$peach       = '#FFC4AD';
		$mint        = '#AAF0D1';
		$pink        = '#F2DAE9';
		$red         = '#E4D1D1';
		$orange      = '#FFEFEB';
		$yellow      = '#FCEECF';
		$white       = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Black', 'chia-lite' ),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__( 'Dark green', 'chia-lite' ),
					'slug'  => 'dark-green',
					'color' => $dark_green,
				),
				array(
					'name'  => esc_html__( 'Main Green', 'chia-lite' ),
					'slug'  => 'main-green',
					'color' => $main_green,
				),
				array(
					'name'  => esc_html__( 'Peach', 'chia-lite' ),
					'slug'  => 'peach',
					'color' => $peach,
				),
				array(
					'name'  => esc_html__( 'Mint', 'chia-lite' ),
					'slug'  => 'mint',
					'color' => $mint,
				),
				array(
					'name'  => esc_html__( 'Pink', 'chia-lite' ),
					'slug'  => 'pink',
					'color' => $pink,
				),
				array(
					'name'  => esc_html__( 'Red', 'chia-lite' ),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__( 'Orange', 'chia-lite' ),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__( 'Yellow', 'chia-lite' ),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__( 'White', 'chia-lite' ),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__( 'Pink to yellow', 'chia-lite' ),
					'gradient' => 'linear-gradient(160deg, ' . $pink . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'pink-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to pink', 'chia-lite' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $pink . ' 100%)',
					'slug'     => 'yellow-to-pink',
				),
				array(
					'name'     => esc_html__( 'peach to yellow', 'chia-lite' ),
					'gradient' => 'linear-gradient(160deg, ' . $peach . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'peach-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to peach', 'chia-lite' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $peach . ' 100%)',
					'slug'     => 'yellow-to-peach',
				),
				array(
					'name'     => esc_html__( 'Red to yellow', 'chia-lite' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $yellow . ' 100%)',
					'slug'     => 'red-to-yellow',
				),
				array(
					'name'     => esc_html__( 'Yellow to red', 'chia-lite' ),
					'gradient' => 'linear-gradient(160deg, ' . $yellow . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'yellow-to-red',
				),
				array(
					'name'     => esc_html__( 'pink to red', 'chia-lite' ),
					'gradient' => 'linear-gradient(160deg, ' . $pink . ' 0%, ' . $red . ' 100%)',
					'slug'     => 'pink-to-red',
				),
				array(
					'name'     => esc_html__( 'Red to pink', 'chia-lite' ),
					'gradient' => 'linear-gradient(160deg, ' . $red . ' 0%, ' . $pink . ' 100%)',
					'slug'     => 'red-to-pink',
				),
			)
		);

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );
	}
}
add_action( 'after_setup_theme', 'chia_lite_setup' );

/**
 * Add Google webfonts, if necessary
 *
 * - See: http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 */
function chia_lite_fonts_url() {

	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Rubik, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$rubik = esc_html_x( 'on', 'Rubik font: on or off', 'chia-lite' );

	if ( 'off' !== $rubik ) {
		$font_families = array();

		if ( 'off' !== $rubik ) {
			$font_families[] = 'Rubik:400,700,400italic,700italic&display=swap';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Count the number of widgets and create a class name.
 */
function chia_lite_widget_counter( $sidebar_id ) {
	$the_sidebars = wp_get_sidebars_widgets();
	if ( ! isset( $the_sidebars[$sidebar_id] ) )
		$count = 0;
	else
		$count = count( $the_sidebars[$sidebar_id] );
	switch ( $count ) {
		case '1':
			$class = 'one-widget';
			break;
		case '2':
			$class = 'two-widgets';
			break;
		case '3':
			$class = 'three-widgets';
			break;
	    case '4':
			$class = 'four-widgets';
			break;
		default :
			$class = 'more-than-three-widgets';
	}
	echo esc_attr( $class );
}

/**
 * Register widget area.
 *
 * @since Chia Lite 1.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @return void
 */
function chia_lite_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'chia-lite' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'chia-lite' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'chia_lite_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since Chia Lite 1.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function chia_lite_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'chia_lite_content_width', 750 );
}
add_action( 'after_setup_theme', 'chia_lite_content_width', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Chia Lite 1.0
 *
 * @return void
 */
function chia_lite_scripts() {	
	// Stylesheet.
	wp_enqueue_style( 'chia-lite-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );

	// RTL styles.
	wp_style_add_data( 'chia-lite-style', 'rtl', 'replace' );

	// enqueue Google fonts, if necessary
	wp_enqueue_style( 'chia-lite-fonts', chia_lite_fonts_url(), false, wp_get_theme()->get( 'Version' ), 'all' );

	// Print styles.
	wp_enqueue_style( 'chia-lite-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );

	// Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Main navigation scripts.
	if ( has_nav_menu( 'primary' ) ) {
		wp_enqueue_script(
			'chia-lite-primary-navigation-script',
			get_template_directory_uri() . '/assets/js/primary-navigation.js',
			wp_get_theme()->get( 'Version' ),
			true
		);
	}

	// Responsive embeds script.
	wp_enqueue_script(
		'chia-lite-responsive-embeds-script',
		get_template_directory_uri() . '/assets/js/responsive-embeds.js',
		wp_get_theme()->get( 'Version' ),
		true
	);

	// Global script.
	wp_enqueue_script(
		'chia-lite-global-script',
		get_template_directory_uri() . '/assets/js/global.js',
		array( 'jquery' ),
		wp_get_theme()->get( 'Version' ),
		true
	);

}
add_action( 'wp_enqueue_scripts', 'chia_lite_scripts' );

/**
 * Enqueue block editor script.
 *
 * @since Chia Lite 1.0
 *
 * @return void
 */
function chia_lite_block_editor_script() {

	wp_enqueue_script( 'chia-lite-editor', get_theme_file_uri( '/assets/js/editor.js' ), array( 'wp-blocks', 'wp-dom' ), wp_get_theme()->get( 'Version' ), true );
	// enqueue Google fonts, if necessary
	wp_enqueue_style( 'chia-lite-fonts', chia_lite_fonts_url(), false, wp_get_theme()->get( 'Version' ), 'all' );
}

add_action( 'enqueue_block_editor_assets', 'chia_lite_block_editor_script' );

/** Enqueue non-latin language styles
 *
 * @since Chia Lite 1.0
 *
 * @return void
 */
function chia_lite_non_latin_languages() {
	$custom_css = chia_lite_get_non_latin_css( 'front-end' );

	if ( $custom_css ) {
		wp_add_inline_style( 'chia-lite-style', $custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'chia_lite_non_latin_languages' );

/**
 * Admin Theme Info
 */

if (!function_exists('chia_lite_admin_scripts')) {
	function chia_lite_admin_scripts($hook) {
		if ('appearance_page_charity' === $hook) {
			wp_enqueue_style('chia-lite-admin', get_template_directory_uri() . '/admin/admin.css');
		}
	}
}
add_action('admin_enqueue_scripts', 'chia_lite_admin_scripts');

if (is_admin()) {
	require get_template_directory() . '/admin/admin.php';
}

// SVG Icons class.
require get_template_directory() . '/classes/class-chia-svg-icons.php';

// Custom color classes.
require get_template_directory() . '/classes/class-chia-custom-colors.php';
new Chia_Lite_Custom_Colors();

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Customizer additions.
require get_template_directory() . '/classes/class-chia-customize.php';
new Chia_Lite_Customize();

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

/**
 * Enqueue scripts for the customizer preview.
 *
 * @since Chia Lite 1.0
 *
 * @return void
 */
function chia_lite_customize_preview_init() {
	wp_enqueue_script(
		'chia-lite-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_enqueue_script(
		'chia-lite-customize-preview',
		get_theme_file_uri( '/assets/js/customize-preview.js' ),
		array( 'customize-preview', 'customize-selective-refresh', 'jquery', 'chia-lite-customize-helpers' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_preview_init', 'chia_lite_customize_preview_init' );

/**
 * Enqueue scripts for the customizer.
 *
 * @since Chia Lite 1.0
 *
 * @return void
 */
function chia_lite_customize_controls_enqueue_scripts() {

	wp_enqueue_script(
		'chia-lite-customize-helpers',
		get_theme_file_uri( '/assets/js/customize-helpers.js' ),
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'chia_lite_customize_controls_enqueue_scripts' );

/**
 * Calculate classes for the main <html> element.
 *
 * @since Chia Lite 1.0
 *
 * @return void
 */
function chia_lite_the_html_classes() {
	$classes = apply_filters( 'chia_lite_html_classes', '' );
	if ( ! $classes ) {
		return;
	}
	echo 'class="' . esc_attr( $classes ) . '"';
}

/**
 * TGMPA plugin activation.
 */
require_once get_template_directory() . '/classes/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'chia_lite_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 */
function chia_lite_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 */
	$plugins = array(
		// WPForms
		array(
			'name'      => esc_html__( 'WPForms Lite', 'chia-lite' ),
			'slug'      => 'wpforms-lite',
			'required'  => false,
		),

		// WPZOOM Recipe Card
		array(
			'name'      => esc_html__( 'WPZoom Recipe Card', 'chia-lite' ),
			'slug'      => 'recipe-card-blocks-by-wpzoom',
			'required'  => false,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 */
	$config = array(
		'id'           => 'chia-lite',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}


