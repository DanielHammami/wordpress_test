<?php
/**
 * Template Name: Business Template
 * @subpackage spasalon
 */
	get_header(); 
	$spasalon_theme_options=spasalon_default_data(); 
	$spasalon_current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), $spasalon_theme_options );
	do_action( 'spasalon_sections', false );

	get_template_part('index','news');

	get_footer(); 
?>