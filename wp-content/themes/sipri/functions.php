<?php
function sipri_css() {
	$parent_style = 'cozipress-parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'sipri-style', get_stylesheet_uri(), array( $parent_style ));
	
	wp_enqueue_style('sipri-responsive',get_stylesheet_directory_uri().'/assets/css/responsive.css');
	wp_dequeue_style('cozipress-responsive');

}
add_action( 'wp_enqueue_scripts', 'sipri_css',999);
   	


function sipri_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'cozipress_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'CE397D',
		'width'                  => 2000,
		'height'                 => 200,
		'flex-height'            => true,
		'wp-head-callback'       => 'cozipress_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'sipri_custom_header_setup' );

/**
 * Import Options From Parent Theme
 *
 */
function sipri_parent_theme_options() {
	$cozipress_mods = get_option( 'theme_mods_cozipress' );
	if ( ! empty( $cozipress_mods ) ) {
		foreach ( $cozipress_mods as $cozipress_mod_k => $cozipress_mod_v ) {
			set_theme_mod( $cozipress_mod_k, $cozipress_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'sipri_parent_theme_options' );



require( get_stylesheet_directory() . '/inc/customizer/customizer-pro/class-customize.php');