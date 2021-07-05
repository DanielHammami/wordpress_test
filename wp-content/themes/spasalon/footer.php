<?php 
$spasalon_current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), spasalon_default_data() );
?>
<!-- Footer Section -->
<footer class="footer-sidebar">	
	
	<?php if( is_active_sidebar('footer-sidebar1') || is_active_sidebar('footer-sidebar2') || is_active_sidebar('footer-sidebar3') || is_active_sidebar('footer-sidebar4')) : ?>
	<div class="empty-footer-sidebar">
	<!-- Footer Widgets -->	
	<div class="container">		
		<div class="row">		
			
			<div class="col-md-3 col-sm-6">
				<?php 
				if( is_active_sidebar('footer-sidebar1') ) :
					dynamic_sidebar( 'footer-sidebar1' ); 
				endif;
				?>
			</div>
					
			<div class="col-md-3 col-sm-6">		
				<?php 
				if( is_active_sidebar('footer-sidebar2') ) :
					dynamic_sidebar( 'footer-sidebar2' ); 
				endif;
				?>
			</div>	
			
			<div class="col-md-3 col-sm-6">	
				<?php 
				if( is_active_sidebar('footer-sidebar3') ) :
					dynamic_sidebar( 'footer-sidebar3' ); 
				endif;
				?>
			</div>
			
			<div class="col-md-3 col-sm-6">
				<?php 
				if( is_active_sidebar('footer-sidebar4') ) :
					dynamic_sidebar( 'footer-sidebar4' ); 
				endif;
				?>
			</div>
			
		</div>
	</div>
	<!-- /End of Footer Widgets -->	
	</div>
	<?php endif; ?>
	
	<!-- Copyrights -->	
	<?php if( $spasalon_current_options['footer_tagline'] != '' || $spasalon_current_options['footer_menu_enabled'] == true ) { ?>
	<div class="site-info">
		<div class="container">
			<div class="row">
			
				<div class="col-md-7">
				
					<?php if( $spasalon_current_options['footer_tagline'] ){ ?>
					<p><?php echo wp_kses_post($spasalon_current_options['footer_tagline']); ?></p>
					<?php } ?>
					
				</div>
				
				<div class="col-md-5">
				<?php 
				if($spasalon_current_options['footer_menu_enabled'] == true ) :?>
					<ul class="footer-links">
					  	<?php 
						wp_nav_menu( 
							array(  
								'menu'           => 'footer-menu',
								'theme_location' => ( has_nav_menu( 'footer' ) ? 'footer' : 'primary' ),
								'depth'          => -1,
								'container'      => false,
								'menu_class'     => '',
								'menu_id'        =>'FooterMenu',
							   'fallback_cb'     => 'spasalon_fallback_page_menu',
								'walker'         => new spasalon_nav_walker()
							)
						);?>
					</ul>
				<?php endif;?>
				</div>
				
			</div>
		</div>
	</div>
    <?php } ?>
	<!-- Copyrights -->	
	
</footer>
</div>
<!-- /End of Footer Section -->
<!--Scroll To Top--> 
<a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>
<!--/End of Scroll To Top--> 	
<?php wp_footer(); ?>
</body>
</html>