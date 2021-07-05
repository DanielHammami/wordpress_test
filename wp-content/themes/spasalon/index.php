<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * @subpackage spasalon
 */
 
get_header();
$spasalon_meta = array();
if( is_front_page() || is_home() ){
	$spasalon_meta         = get_post_meta( get_option('page_for_posts') ,'_spasalon_meta', TRUE );
}
if( isset($spasalon_meta['banner_enable'])==true ) {
spasalon_page_banner_strip();
}
else
{
spasalon_pink_banner_strip(); // banner strip
}
?>
<!-- Blog & Sidebar Section -->
<section id="section">		
	<div class="container" id="wrapper">
		<div class="row">
			
			<!--Blog Detail-->
			<div class="col-md-8 col-xs-12">
				<div class="site-content">
					
					<?php if( have_posts() ): ?>
					
						<?php while( have_posts() ): the_post(); ?>
						
							<?php get_template_part('content',''); ?>
					
						<?php endwhile;
						wp_reset_postdata();
						?>
						
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