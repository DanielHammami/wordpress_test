<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Chia Lite
 * @since Chia Lite 1.0
 */

get_header();
?>

	<div class="error-404 not-found default-max-width">
		<div class="page-content">
		<?php if(get_theme_mod('chia_lite_error_image')) : ?>	
		<figure class="aligncenter">
		    <img class="404-page" src="<?php echo esc_url( get_theme_mod( 'chia_lite_error_image' ) ); ?>" alt="<?php esc_attr_e('404 Page', 'chia-lite'); ?>" />
		</figure>
		<?php else: ?>
			<figure class="aligncenter">
		        <img class="404-page" src="<?php echo esc_url(get_template_directory_uri() ); ?>/assets/images/404-page.png" alt="<?php esc_attr_e('404 Page', 'chia-lite'); ?>" />
		    </figure>
		<?php endif; ?>
		<header class="page-header alignwide">
		    <h1 class="page-title"><?php echo esc_textarea ( get_theme_mod( 'chia_lite_error_title', 'Oops! Error 404' ) ); ?></h1>
	    </header><!-- .page-header -->
			<p><?php echo esc_textarea ( get_theme_mod( 'chia_lite_error_text', 'It looks like nothing was found at this location. Maybe try a search?' ) ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .page-content -->
	</div><!-- .error-404 -->

<?php
get_footer();
