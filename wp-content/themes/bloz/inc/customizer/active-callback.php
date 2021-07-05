<?php
/**
 * Theme Ostrich 
 *
 * @package Bloz
 * active callbacks.
 * 
 */

/*========================slider==============================*/
/**
 * Check if the slider is enabled
 */
function bloz_if_slider_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'bloz_slider' )->value();
}

/*========================Design and Fashion==============================*/
/**
 * Check if the design is enabled
 */
function bloz_if_design_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'bloz_design' )->value();
}

/*========================Gallery==============================*/
/**
 * Check if the gallery is enabled
 */
function bloz_if_gallery_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'bloz_gallery' )->value();
}

/*==========================Latest Posts=========================*/
/**
 * Check if the latest_posts is enabled
 */
function bloz_if_latest_posts_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'bloz_latest_posts' )->value();
}

/*========================recent_slider==============================*/
/**
 * Check if the recent_slider is enabled
 */
function bloz_if_recent_slider_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'bloz_recent_slider' )->value();
}

/*========================blog_posts==============================*/
/**
 * Check if the blog_posts is enabled
 */
function bloz_if_blog_posts_enabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'bloz_blog_posts' )->value();
}
