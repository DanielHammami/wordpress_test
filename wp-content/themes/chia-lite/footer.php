<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Chia Lite
 * @since Chia Lite 1.0
 */

?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav aria-label="<?php esc_attr_e( 'Secondary menu', 'chia-lite' ); ?>" class="footer-navigation">
				<ul class="footer-navigation-wrapper">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'items_wrap'     => '%3$s',
							'container'      => false,
							'depth'          => 1,
							'link_before'	 => '<span class="screen-reader-text">',
			                'link_after'	 => '</span>',
							'fallback_cb'    => false,
						)
					);
					?>
				</ul><!-- .footer-navigation-wrapper -->
			</nav><!-- .footer-navigation -->
		<?php endif; ?>
		<div class="site-info">
			<div class="site-name">
				<?php if ( has_custom_logo() ) : ?>
					<div class="site-logo"><?php the_custom_logo(); ?></div>
				<?php else : ?>
					<?php if ( get_bloginfo( 'name' ) && get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
						<?php if ( is_front_page() && ! is_paged() ) : ?>
							<?php bloginfo( 'name' ); ?>
						<?php else : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			</div><!-- .site-name -->
	
			<div class="powered-by">
			    <?php
			        if ( function_exists( 'the_privacy_policy_link' ) ) {
			        the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
			    }
		        ?>
				<?php if( get_theme_mod( 'chia_lite_hide_copyright' ) == '') { ?>
				<?php
			        /**
			        * Fires before the chia footer text for footer customization.
			        *
			        * @since Chia Lite 1.0
			        */
			            do_action( 'chia_lite_credits' );
		        ?>
		        <?php esc_attr_e('&copy;', 'chia-lite'); ?>
			       <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"> <?php echo esc_textarea ( get_theme_mod( 'chia_lite_copyright', 'Chia Lite Theme by Anariel Design. Proudly powered by WordPress.' ) ); ?> </a>
			    </div><!-- .powered-by -->
			    <?php } // end if ?>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
