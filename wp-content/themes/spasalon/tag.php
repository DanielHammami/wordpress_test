<?php
/**
 * The tags template file
 * @subpackage spasalon
 */
 
get_header(); 
spasalon_page_banner_strip(); // banner strip
?>

<!-- Blog & Sidebar Section -->
<section id="section">		
	<div class="container" id="wrapper">
		<div class="row">
			
			<!--Blog Detail-->
			<div class="col-md-8 col-xs-12">
				<div class="site-content">
					
					<?php if( have_posts() ): ?>
						
						<header class="page-header">
							<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="taxonomy-description">', '</div>' );
							?>
						</header><!-- .page-header -->
			
						<?php while( have_posts() ): the_post(); ?>
						
							<?php get_template_part('content',''); ?>
					
						<?php endwhile; ?>
						
						<div class="paginations">
						<?php						
						// Previous/next page navigation.
						the_posts_pagination( array(
						'prev_text'          => esc_html__('Previous','spasalon'),
						'next_text'          => esc_html__('Next','spasalon')
						) ); ?>
						</div>
						
					<?php else: ?>
						
						<?php get_template_part('content','none'); ?>
						
					<?php endif; ?>
			
				</div>
			</div>
			<!--/End of Blog Detail-->

			<?php get_sidebar(); ?>
		
		</div>	
	</div>
</section>
<!-- End of Blog & Sidebar Section -->
 
<div class="clearfix"></div>

<?php get_footer(); ?>