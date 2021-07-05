<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Chia Lite
 * @since Chia Lite 1.0
 */

get_header();

$description = get_the_archive_description();
?>

<?php if(is_active_sidebar( 'sidebar-2' )) : ?>

	<header class="page-header alignwide">
	    <?php
			
			if(!get_theme_mod( 'chia_lite_archive_category' )) : 
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				    else:
					    echo '<h1 class="page-title">' . single_cat_title('',false) . '</h1>';
				    endif;
				the_archive_description( '<div class="archive-description">', '</div><!-- .archive-description -->' );
			
		?>

	</header><!-- .page-header -->
    <div id="primary-content">
	    <div class="flexcontainer">

            <?php if ( have_posts() ) : ?>

	            <?php while ( have_posts() ) : ?>
		            <?php the_post(); ?>
		            <?php get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'content' ) ); ?>
	            <?php endwhile; ?>

	        <?php chia_lite_the_posts_navigation(); ?>

		<?php else : ?>
			<?php get_template_part( 'template-parts/content/content-none' ); ?>
		<?php endif; ?>

        </div><!-- .flexcontainer -->

    </div><!-- #primary -->
<?php get_sidebar(); ?>

<?php else: ?>

	<?php if ( have_posts() ) : ?>

		<header class="page-header alignwide">
	    <?php
			
			if(!get_theme_mod( 'chia_lite_archive_category' )) : 
				the_archive_title( '<h1 class="page-title">', '</h1>' );
					else:
					    echo '<h1 class="page-title">' . single_cat_title('',false) . '</h1>';
				    endif;
				the_archive_description( '<div class="archive-description">', '</div><!-- .archive-description -->' );
			
		?>

	</header><!-- .page-header -->

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'content' ) ); ?>
    <?php endwhile; ?>

    <?php chia_lite_the_posts_navigation(); ?>

    <?php else : ?>
        <?php get_template_part( 'template-parts/content/content-none' ); ?>
    <?php endif; ?>
<?php endif; ?>

<?php get_footer(); ?>


