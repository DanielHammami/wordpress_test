<?php
/**
 * Template part for displaying content  in post.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bloz
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'hentry' ); ?>>
	<?php
	$bloz_enable_single_featured_img = get_theme_mod( 'bloz_enable_single_featured_img', true );
	if ( has_post_thumbnail() && $bloz_enable_single_featured_img ) : ?>
		<div class="featured-image">
			<?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
		</div><!-- .featured-post-image -->
	<?php endif; ?>

	<div class="entry-meta">
		<?php

		$single_author_enable = get_theme_mod( 'bloz_enable_single_author', true );
		if ( $single_author_enable ) {
			bloz_post_author();
		}
		
		$single_date_enable = get_theme_mod( 'bloz_enable_single_date', true );
		if ( $single_date_enable ) {
			bloz_posted_on();
		}

		echo bloz_cats();
		?>
	</div><!-- .entry-meta -->
	<div class="entry-container">
		<div class="entry-content">

			<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bloz' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bloz' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
		
	</div><!-- .entry-container -->
	<div class="entry-meta">
		<?php bloz_tags(); ?>
	</div><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->