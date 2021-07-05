<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Chia Lite
 * @since Chia Lite 1.0
 */

?>
<div class="grid-item">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'template-parts/header/excerpt-header', get_post_format() ); ?>

	<div class="entry-content">
		<?php get_template_part( 'template-parts/excerpt/excerpt', get_post_format() ); ?>
	</div><!-- .entry-content -->

	<?php if(!get_theme_mod('chia_lite_posted_on')) : ?>
	    <footer class="entry-footer default-max-width">
		    <?php chia_lite_entry_meta_footer(); ?>
	    </footer><!-- .entry-footer -->
	<?php endif; ?>
	
</article><!-- #post-${ID} -->

</div>