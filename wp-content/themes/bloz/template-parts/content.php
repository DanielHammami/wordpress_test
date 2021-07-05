<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bloz
 */
?>
<?php
$archive_img_enable = get_theme_mod( 'bloz_enable_archive_featured_img', true );
 if (has_post_thumbnail() && $archive_img_enable) {
	$classes ='has-post-thumbnail';
} else {
	$classes ='no-post-thumbnail';
}?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="<?php echo esc_attr($classes); ?>">
    
    <?php
	$archive_img_enable = get_theme_mod( 'bloz_enable_archive_featured_img', true );
	$img_url = '';
	if ( has_post_thumbnail() && $archive_img_enable ) :
		$img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		?>
		<div class="featured-image" style="background-image: url('<?php echo esc_url( $img_url ); ?>');">
			<?php
			if ( ! empty( $img_url ) ) : ?>
				<a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
			<?php endif; ?>
		</div><!-- .featured-image -->
		<?php	
	endif;
	?>

    <div class="entry-container">
    	
        <div class="entry-meta">
            <span class="cat-links">
                <?php 
                $archive_category_enable = get_theme_mod( 'bloz_enable_archive_cat', true );

                if ( $archive_category_enable ) {
				the_category('', '');
			}
                 ?>
            </span>
        </div><!-- .entry-meta -->

        <header class="entry-header">
           <?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; ?>
        </header>

        <div class="entry-content">
           <?php
			$archive_content_type = get_theme_mod( 'bloz_enable_archive_content_type', 'excerpt' );
			if ( 'excerpt' === $archive_content_type ) {
				the_excerpt();
				?>
				<?php
			} else {
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
			}
			?>
        </div>

        <div class="footer-meta">
            <?php
	    $archive_author_enable = get_theme_mod( 'bloz_enable_archive_author', true );
	    if ( $archive_author_enable ) {
	    	bloz_post_author();
	    } ?>

           <?php 
           $archive_date_enable = get_theme_mod( 'bloz_enable_archive_date', true );
           	if ( $archive_date_enable ) {
				bloz_posted_on();
			}

            ?>


            <?php 
           $archive_comment_enable = get_theme_mod( 'bloz_enable_archive_comment', true );
           if ( $archive_comment_enable ) { ?>
				<span class="comment"><a class="url fn n" href="<?php the_permalink(); ?>"><?php echo get_comments_number( ); ?></a></span>
			<?php }

            ?>
            
        </div><!-- .entry-meta -->
    </div><!-- .entry-container -->
</article>