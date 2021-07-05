<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bloz
 */

if ( is_archive() || bloz_is_latest_posts() || is_404() || is_search() ) {
	$archive_sidebar = get_theme_mod( 'bloz_archive_sidebar', 'right' ); 
	if ( 'no' === $archive_sidebar ) {
		return;
	}
} elseif ( is_single() ) {
    $bloz_post_sidebar_meta = get_post_meta( get_the_ID(), 'bloz-select-sidebar', true );
	$global_post_sidebar = get_theme_mod( 'bloz_global_post_layout', 'right' ); 

	if ( ! empty( $bloz_post_sidebar_meta ) && ( 'no' === $bloz_post_sidebar_meta ) ) {
		return;
	} elseif ( empty( $bloz_post_sidebar_meta ) && 'no' === $global_post_sidebar ) {
		return;
	}
} elseif ( bloz_is_frontpage_blog() || is_page() ) {
	if ( bloz_is_frontpage_blog() ) {
		$page_id = get_option( 'page_for_posts' );
	} else {
		$page_id = get_the_ID();
	}
	
    $bloz_page_sidebar_meta = get_post_meta( $page_id, 'bloz-select-sidebar', true );
	$global_page_sidebar = get_theme_mod( 'bloz_global_page_layout', 'right' ); 

	if ( ! empty( $bloz_page_sidebar_meta ) && ( 'no' === $bloz_page_sidebar_meta ) ) {
		return;
	} elseif ( empty( $bloz_page_sidebar_meta ) && 'no' === $global_page_sidebar ) {
		return;
	}
}

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
