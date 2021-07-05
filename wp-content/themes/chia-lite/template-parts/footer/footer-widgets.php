<?php
/**
 * Displays the footer widget area.
 *
 * @package WordPress
 * @subpackage Chia Lite
 * @since Chia Lite 1.0
 */

if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<div class="site-footer widget-block">
	<aside class="<?php chia_lite_widget_counter( 'sidebar-1' ); ?> widget-area">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- .widget-area -->
</div>
<?php endif; ?>
