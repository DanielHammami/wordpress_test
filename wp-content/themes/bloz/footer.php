<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bloz
 */

$default = bloz_get_default_mods();
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<!-- supports col-1, col-2, col-3 and col-4 -->
		<!-- supports unequal-width and equal-width -->
		<?php  
		$count = 0;
		for ( $i=1; $i <=4 ; $i++ ) { 
			if ( is_active_sidebar( 'footer-' . $i ) ) {
				$count++;
			}
		}
		
		if ( 0 !== $count ) : ?>
			<div class="footer-widgets-area page-section col-<?php echo esc_attr( $count );?>">
			    <div class="container">
					<?php 
					for ( $j=1; $j <=4; $j++ ) { 
						if ( is_active_sidebar( 'footer-' . $j ) ) {
			    			echo '<div class="hentry">';
							dynamic_sidebar( 'footer-' . $j ); 
			    			echo '</div>';
						}
					}
					?>
				</div><!-- .wrapper -->
			</div><!-- .footer-widget-area -->

		<?php endif;
		 $bloz_search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $copyright = str_replace( $bloz_search, $replace, get_theme_mod( 'bloz_copyright_txt', $default['bloz_copyright_txt'] ) );

			?>

			<div class="site-info">
				
				<?php 

				?>
				<div class="wrapper">
					<span>	
					<?php echo wp_kses_post(  $copyright ); ?> 	
					<?php echo sprintf( esc_html__( '%1$s by %2$s.', 'bloz' ), 'Bloz', '<a target="_blank" href="' . esc_url( 'http://themeostrich.com/' ) . '">Theme Ostrich</a>' ); ?>	
					</span>	 		    
				</div><!-- .wrapper -->    
				
			</div><!-- .site-info -->
			
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
