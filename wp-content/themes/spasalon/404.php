<?php
/**
 * 404 template file
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
					<h3 class="entry-title"><?php esc_html_e('Oops! Page not found','spasalon'); ?></h3>
					
					<h1 class="error_404"><?php esc_html_e('4','spasalon'); ?><i class="fa fa-frown-o"></i><?php esc_html_e('4','spasalon'); ?> </h1>
					
					<p><?php esc_html_e ('We are sorry, but the page you are looking for does not exist.','spasalon'); ?> <a href="<?php echo esc_url( home_url( '/' ) );?>"><?php esc_html_e('Go Back','spasalon'); ?></a></p>	
					
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