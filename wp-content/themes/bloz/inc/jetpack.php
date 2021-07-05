<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package Bloz
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */

function bloz_jetpack_setup() {
	$pagination_type = get_theme_mod( 'bloz_archive_pagination_type', 'numeric' );

	if ( 'infinite_scroll' === $pagination_type ) {
		// Add theme support for Infinite Scroll.
		add_theme_support( 'infinite-scroll', array(
			'type'		=> 'scroll',
			'container' => 'infinite-post-wrap',
			'render'    => 'bloz_infinite_scroll_render',
			'footer'    => 'page',
			'wrapper'	=> false,
			'footer_widgets' => false,
			'posts_per_page' => get_option('posts_per_page'),
		) );
	}

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'bloz_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function bloz_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}

/**
 * Sort all Infinite Scroll results alphabetically by post name
 *
 * @param array $args
 * @filter infinite_scroll_query_args
 * @return array
 */
function bloz_infinite_scroll_query_args( $args ) {
    $args['ignore_sticky_posts']   = true;
    return $args;
}
add_filter( 'infinite_scroll_query_args', 'bloz_infinite_scroll_query_args' );