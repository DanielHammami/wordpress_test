<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Bloz
 */

get_header(); ?>
		
	<div id="page-site-header" class="relative container" style="background-image: url('<?php echo esc_url( get_header_image() ) ; ?>');">
	 	<div class="overlay"></div>
        <div class="container">  	
		        <header class="page-header">
		            <h1 class="page-title"><?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'bloz' ), '<span>' . get_search_query() . '</span>' );
					?></h1>
		        </header>
		        <?php  
		        $breadcrumb_enable = get_theme_mod( 'bloz_breadcrumb_enable', true );
		        if ( $breadcrumb_enable ) : 
		            ?>
		            <div id="breadcrumb-list">
		                    <?php echo bloz_breadcrumb( array( 'show_on_front'   => false, 'show_browse' => false ) ); ?>
		            </div><!-- #breadcrumb-list -->
		        <?php endif; ?>
		    </div><!-- .wrapper -->
		</div><!-- #page-site-header -->

    <div id="content-wrapper" class="pt">
        <div class="container">
			<div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                	<?php 
            		$archive_layout = get_theme_mod( 'bloz_archive_layout', 'col-2' ); 
                	?>
                    <div id="infinite-post-wrap" class="blog-post-wrapper <?php echo esc_attr( $archive_layout ) ; ?> clear">

						<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );

							endwhile;

							wp_reset_postdata();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
					</div><!-- .posts-wrapper -->
					<?php bloz_posts_pagination(); ?>
				</main><!-- #main -->
			</div><!-- #primary -->
			
			<?php get_sidebar(); ?>

		</div>
	</div>

<?php
get_footer();
