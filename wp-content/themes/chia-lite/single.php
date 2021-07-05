<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Chia Lite
 * @since Chia Lite 1.0
 */

get_header();?>
<?php if(is_active_sidebar( 'sidebar-2' )) : ?>
	<div id="primary-content">
<?php while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-single' );

	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'chia-lite' ), '%title' ),
			)
		);
	}

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

	// Previous/next post navigation.
	$chia_lite_next = is_rtl() ? chia_lite_get_icon_svg( 'ui', 'arrow_left' ) : chia_lite_get_icon_svg( 'ui', 'arrow_right' );
	$chia_lite_prev = is_rtl() ? chia_lite_get_icon_svg( 'ui', 'arrow_right' ) : chia_lite_get_icon_svg( 'ui', 'arrow_left' );

	$chia_lite_next_label     = esc_html__( 'Next post', 'chia-lite' );
	$chia_lite_previous_label = esc_html__( 'Previous post', 'chia-lite' );

	the_post_navigation(
		array(
			'next_text' => '<p class="meta-nav">' . $chia_lite_next_label . $chia_lite_next . '</p><p class="post-title">%title</p>',
			'prev_text' => '<p class="meta-nav">' . $chia_lite_prev . $chia_lite_previous_label . '</p><p class="post-title">%title</p>',
		)
	);
endwhile; ?> 
</div>

<?php get_sidebar(); ?>

<?php else: ?>

	<?php while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-single' );

	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'chia-lite' ), '%title' ),
			)
		);
	}

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

	// Previous/next post navigation.
	$chia_lite_next = is_rtl() ? chia_lite_get_icon_svg( 'ui', 'arrow_left' ) : chia_lite_get_icon_svg( 'ui', 'arrow_right' );
	$chia_lite_prev = is_rtl() ? chia_lite_get_icon_svg( 'ui', 'arrow_right' ) : chia_lite_get_icon_svg( 'ui', 'arrow_left' );

	$chia_lite_next_label     = esc_html__( 'Next post', 'chia-lite' );
	$chia_lite_previous_label = esc_html__( 'Previous post', 'chia-lite' );

	the_post_navigation(
		array(
			'next_text' => '<p class="meta-nav">' . $chia_lite_next_label . $chia_lite_next . '</p><p class="post-title">%title</p>',
			'prev_text' => '<p class="meta-nav">' . $chia_lite_prev . $chia_lite_previous_label . '</p><p class="post-title">%title</p>',
		)
	);
endwhile; ?> 

<?php endif; ?>
<?php get_footer();?>