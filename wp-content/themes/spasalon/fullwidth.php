<?php
/**
 * Template Name: Page Full Width
 *
 */
 
get_header(); 
$spasalon_meta = get_post_meta( get_the_ID() ,'_spasalon_meta', TRUE );
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
			<div class="col-md-12 col-xs-12">
				<div class="site-content">
					
					<?php while( have_posts() ): the_post(); ?>
						
						<?php get_template_part('content','page'); ?>
						
						<?php 
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
						?>
					
					<?php endwhile; ?>
			
				</div>
			</div>
			<!--/End of Blog Detail-->
		
		</div>	
	</div>
</section>
<!-- End of Blog & Sidebar Section -->
 
<div class="clearfix"></div>

<?php get_footer(); ?>