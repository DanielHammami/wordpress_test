<?php
// Webriti scripts
if( !function_exists('spasalon_scripts'))
{
	function spasalon_scripts(){
		
		$spasalon_current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), spasalon_default_data() );
		
		// css
		wp_enqueue_style('style', get_stylesheet_uri() );
		wp_enqueue_style('bootstrap', SPASALON_TEMPLATE_DIR_URI . '/css/bootstrap.css' );
		wp_enqueue_style('spasalon-custom', SPASALON_TEMPLATE_DIR_URI . '/css/custom.css' );
		wp_enqueue_style('spasalon-default', SPASALON_TEMPLATE_DIR_URI . '/css/default.css' );
		wp_enqueue_style('flexslider', SPASALON_TEMPLATE_DIR_URI . '/css/flexslider.css' );
		
		wp_enqueue_style('spasalon-font', SPASALON_TEMPLATE_DIR_URI . '/css/font/font.css' );
		wp_enqueue_style('spasalon-font-awesome', SPASALON_TEMPLATE_DIR_URI . '/css/font-awesome/css/font-awesome.min.css' );
		
		// js
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'spasalon-bootstrap-js' , SPASALON_TEMPLATE_DIR_URI . '/js/bootstrap.min.js' );
		wp_enqueue_script( 'spasalon-custom-js' , SPASALON_TEMPLATE_DIR_URI . '/js/custom.js' );
		
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	}
}
add_action('wp_enqueue_scripts','spasalon_scripts');


function spasalon_admin_enqueue_scripts(){
	wp_enqueue_style('spasalon-drag-drop-css', SPASALON_TEMPLATE_DIR_URI . '/css/drag-drop.css');
}
add_action( 'admin_enqueue_scripts', 'spasalon_admin_enqueue_scripts' );