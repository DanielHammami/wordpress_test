<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package WordPress
 * @subpackage Chia Lite
 * @since Chia Lite 1.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$chia_lite_unique_id = wp_unique_id( 'search-form-' );

$chia_lite_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>
<form role="search" <?php echo esc_attr( $chia_lite_aria_label ); ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $chia_lite_unique_id ); ?>"><?php _e( 'Search&hellip;', 'chia-lite' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></label>
	<input type="search" id="<?php echo esc_attr( $chia_lite_unique_id ); ?>" class="search-field" value="<?php echo get_search_query(); ?>" name="s" />
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'chia-lite' ); ?>" />
</form>
