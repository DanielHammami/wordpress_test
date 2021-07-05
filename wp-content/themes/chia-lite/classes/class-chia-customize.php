<?php
/**
 * Customizer settings for this theme.
 *
 * @package WordPress
 * @subpackage Chia Lite
 * @since Chia Lite 1.0
 */

if ( ! class_exists( 'Chia_Lite_Customize' ) ) {
	/**
	 * Customizer Settings.
	 *
	 * @since Chia Lite 1.0
	 */
	class Chia_Lite_Customize {

		/**
		 * Constructor. Instantiate the object.
		 *
		 * @access public
		 *
		 * @since Chia Lite 1.0
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'register' ) );
		}

		/**
		 * Register customizer options.
		 *
		 * @access public
		 *
		 * @since Chia Lite 1.0
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @return void
		 */
		public function register( $wp_customize ) {

			// Change site-title & description to postMessage.
			$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage'; // @phpstan-ignore-line. Assume that this setting exists.
			$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage'; // @phpstan-ignore-line. Assume that this setting exists.

			// Add partial for blogname.
			$wp_customize->selective_refresh->add_partial(
				'blogname',
				array(
					'selector'        => '.site-title',
					'render_callback' => array( $this, 'partial_blogname' ),
				)
			);

			// Add partial for blogdescription.
			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				array(
					'selector'        => '.site-description',
					'render_callback' => array( $this, 'partial_blogdescription' ),
				)
			);

			// Add "display_title_and_tagline" setting for displaying the site-title & tagline.
			$wp_customize->add_setting(
				'display_title_and_tagline',
				array(
					'capability'        => 'edit_theme_options',
					'default'           => true,
					'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
				)
			);

			// Add control for the "display_title_and_tagline" setting.
			$wp_customize->add_control(
				'display_title_and_tagline',
				array(
					'type'    => 'checkbox',
					'section' => 'title_tagline',
					'label'   => esc_html__( 'Display Site Title & Tagline', 'chia-lite' ),
				)
			);

			/**
	         * Add the Theme Options section
	        */
	        $wp_customize->add_panel( 'chia_lite_options_panel', array(
		        'title'          => esc_html__( 'Theme Options', 'chia-lite' ),
		        'description'    => esc_html__( 'Configure your theme settings', 'chia-lite' ),
				'priority'	 => 33
			) );
			
			/* Header Layout */
	        $wp_customize->add_section( 'chia_lite_header', array(
		        'title'           => esc_html__( 'Header Options', 'chia-lite' ),
		        'panel'           => 'chia_lite_options_panel',
				'priority'	 => 121
	        ) );
	        $wp_customize->add_setting( 'chia_lite_header_layout', array(
		        'default'           => 'static-header',
		        'sanitize_callback' => array( __CLASS__, 'sanitize_choices' ),
	        ) );
	        $wp_customize->add_control( 'chia_lite_header_layout', array(
		        'label'             => esc_html__( 'Header Options', 'chia-lite' ),
		        'section'           => 'chia_lite_header',
		        'priority'          => 1,
		        'type'              => 'radio',
		        'choices'           => array(
				'static-header'         => esc_html__( 'Classic Header', 'chia-lite' ),
				'fixed-header'          => esc_html__( 'Classic Header Sticky', 'chia-lite' ),
		    )
	        ) );

			/**
	        * Adds the individual sections for copyright
	        */
	        $wp_customize->add_section( 'chia_lite_copyright_section' , array(
		        'title'    => esc_html__( 'Copyright Settings', 'chia-lite' ),
		        'panel'	   => 'chia_lite_options_panel',
				'priority' => 130,
	        ) );

	        $wp_customize->add_setting( 'chia_lite_copyright', array(
		       'default'           => esc_html__( 'Proudly powered by WordPress. Chia Lite Theme by Anariel Design. All rights reserved', 'chia-lite' ),
		       'sanitize_callback' => array( __CLASS__, 'sanitize_text' ),
	        ) );
	        $wp_customize->add_control( 'chia_lite_copyright', array(
		       'label'             => esc_html__( 'Copyright text', 'chia-lite' ),
		       'section'           => 'chia_lite_copyright_section',
		       'settings'          => 'chia_lite_copyright',
		       'type'		        => 'text',
		       'priority'          => 1,
	        ) );

	        $wp_customize->add_setting( 'chia_lite_hide_copyright', array(
		        'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
	        ) );
	        $wp_customize->add_control( 'hide_copyright', array(
		        'label'             => esc_html__( 'Hide copyright text', 'chia-lite' ),
		        'section'           => 'chia_lite_copyright_section',
		        'settings'          => 'chia_lite_hide_copyright',
		        'type'		        => 'checkbox',
		        'priority'          => 2,
	        ) );

			/* 404 Image */
	       $wp_customize->add_section( 'chia_lite_error', array(
		        'title'           => esc_html__( '404 Page Image', 'chia-lite' ),
		        'panel'           => 'chia_lite_options_panel',
				'priority'	      => 134
	        ) );
	
	        /* Upload 404 Page Image */
	        $wp_customize->add_setting('chia_lite_error_image', array(
		        'transport'			=> 'refresh',
		        'sanitize_callback' => 'esc_url_raw',
	        ) );

	        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		        'chia_lite_error_image', array(
		        'label'		=> esc_html__( '404 Image', 'chia-lite' ),
		        'section'	=> 'chia_lite_error',
		        'priority'          => 1,
		        'description' => esc_html__( 'Add an image to be displayed on a 404 page.', 'chia-lite' ),
	        ) ) );

			/* 404 Page Title */
	        $wp_customize->add_setting( 'chia_lite_error_title', array(
		        'default'           => 'Oops! Error 404',
		        'sanitize_callback' => array( __CLASS__, 'sanitize_text' ),
	        ) );
	        $wp_customize->add_control( 'chia_lite_error_title', array(
		        'label'             => esc_html__( '404 page title', 'chia-lite' ),
		        'description'       => esc_html__( 'Enter the text for your 404 page title', 'chia-lite' ),
		        'section'           => 'chia_lite_error',
		        'priority'          => 2,
		        'type'              => 'text',
	        ) );

			/* 404 Page Text */
	        $wp_customize->add_setting( 'chia_lite_error_text', array(
		        'default'           => 'It looks like nothing was found at this location. Maybe try a search?',
		        'sanitize_callback' => array( __CLASS__, 'sanitize_text' ),
	        ) );
	        $wp_customize->add_control( 'chia_lite_error_text', array(
		        'label'             => esc_html__( '404 page text', 'chia-lite' ),
		        'description'       => esc_html__( 'Enter the text for your 404 page text', 'chia-lite' ),
		        'section'           => 'chia_lite_error',
		        'priority'          => 3,
		        'type'              => 'text',
	        ) );

			//Page Title
	        $wp_customize->add_section( 'chia_lite_page_options', array(
		        'title'           => esc_html__( 'Page Options', 'chia-lite' ),
		        'panel'	  => 'chia_lite_options_panel',
				'priority'	 => 135
	        ) );

			/* Post Settings */
	        $wp_customize->add_setting( 'chia_lite_page_title', array(
		        'default'           => false,
		        'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
	        ) );
	        $wp_customize->add_control('chia_lite_page_title', array(
				'label'      => esc_html__( 'Show Page Title', 'chia-lite' ),
				'section'    => 'chia_lite_page_options',
				'settings'   => 'chia_lite_page_title',
				'type'		 => 'checkbox',
				'priority'	 => 1
	        ) );

			/* Page Animation */
	        $wp_customize->add_section( 'chia_lite_page_animation', array(
		        'title'           => esc_html__( 'Page Load Animation', 'chia-lite' ),
		        'panel'           => 'chia_lite_options_panel',
				'priority'	      => 136
	        ) );

			$wp_customize->add_setting( 'chia_lite_page_loading_animation', array(
		        'default'           => false,
		        'sanitize_callback' => array( __CLASS__, 'sanitize_checkbox' ),
	        ) );
	        $wp_customize->add_control( 'chia_lite_page_loading_animation', array(
		        'label'             => esc_html__( 'Disable page load animation', 'chia-lite' ),
		        'section'           => 'chia_lite_page_animation',
		        'type'		        => 'checkbox',
		        'priority'          => 1,
	        ) );

			// Background color.
			// Include the custom control class.
			include_once get_theme_file_path( 'classes/class-chia-customize-color-control.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

			// Register the custom control.
			$wp_customize->register_control_type( 'Chia_Lite_Customize_Color_Control' );

			// Get the palette from theme-supports.
			$palette = get_theme_support( 'editor-color-palette' );

			// Build the colors array from theme-support.
			$colors = array();
			if ( isset( $palette[0] ) && is_array( $palette[0] ) ) {
				foreach ( $palette[0] as $palette_color ) {
					$colors[] = $palette_color['color'];
				}
			}

			// Add the control. Overrides the default background-color control.
			$wp_customize->add_control(
				new Chia_Lite_Customize_Color_Control(
					$wp_customize,
					'background_color',
					array(
						'label'   => esc_html_x( 'Background color', 'Customizer control', 'chia-lite' ),
						'section' => 'colors',
						'palette' => $colors,
					)
				)
			);
		}

		/**
		 * Sanitize boolean for checkbox.
		 *
		 * @access public
		 *
		 * @since Chia Lite 1.0
		 *
		 * @param bool $checked Whether or not a box is checked.
		 *
		 * @return bool
		 */
		public static function sanitize_checkbox( $checked = null ) {
			return (bool) isset( $checked ) && true === $checked;
		}

		/**
		 * Sanitize html
		 *
		 * @param  string $input    setting input.
		 * @return mixed            setting input value.
		 */
		public static function sanitize_html( $input ) {
			return wp_kses_post( $input );
		}

		/**
		 * Sanitize text
		 *
		 * @param  string $input    setting input.
		 * @return mixed            setting input value.
		 */
		public static function sanitize_text( $input ) {
			return wp_kses_post( force_balance_tags ( esc_attr($input) ) );
		}

		/**
		 * Sanitize Select choices
		 *
		 * @param  string $input    setting input.
		 * @param  object $setting  setting object.
		 * @return mixed            setting input value.
		 */
		public static function sanitize_choices( $input, $setting ) {

			// Ensure input is a slug.
			$input = sanitize_key( $input );

			// Get list of choices from the control
			// associated with the setting.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			// If the input is a valid key, return it;
			// otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
		}

		/**
		 * Render the site title for the selective refresh partial.
		 *
		 * @access public
		 *
		 * @since Chia Lite 1.0
		 *
		 * @return void
		 */
		public function partial_blogname() {
			bloginfo( 'name' );
		}

		/**
		 * Render the site tagline for the selective refresh partial.
		 *
		 * @access public
		 *
		 * @since Chia Lite 1.0
		 *
		 * @return void
		 */
		public function partial_blogdescription() {
			bloginfo( 'description' );
		}
	}
}
