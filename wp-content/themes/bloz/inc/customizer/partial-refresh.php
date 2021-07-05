<?php
/**
 * Theme Ostrich 
 *
 * @package Bloz
 * partial refresh
 * 
 */

//design
/**
 * Selective refresh for design_title.
 */
function bloz_design_partial_title() {
	return esc_html( get_theme_mod( 'bloz_design_title' ) );
}

//featured posts
/**
 * Selective refresh for latest_posts_title.
 */
function bloz_latest_posts_partial_title() {
	return esc_html( get_theme_mod( 'bloz_latest_posts_title' ) );
}

//blog posts
/**
 * Selective refresh for latest_posts_title.
 */
function bloz_blog_posts_partial_title() {
	return esc_html( get_theme_mod( 'bloz_blog_posts_title' ) );
}