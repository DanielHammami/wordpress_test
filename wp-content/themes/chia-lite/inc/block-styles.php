<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package WordPress
 * @subpackage Chia Lite
 * @since Chia Lite 1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since Chia Lite 1.0
	 *
	 * @return void
	 */
	function chia_lite_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'chia-lite-columns-overlap',
				'label' => esc_html__( 'Overlap', 'chia-lite' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'chia-lite-border',
				'label' => esc_html__( 'Borders', 'chia-lite' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'chia-lite-border',
				'label' => esc_html__( 'Borders', 'chia-lite' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'chia-lite-border',
				'label' => esc_html__( 'Borders', 'chia-lite' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'chia-lite-image-frame',
				'label' => esc_html__( 'Frame', 'chia-lite' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'chia-lite-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'chia-lite' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'chia-lite-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'chia-lite' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'chia-lite-border',
				'label' => esc_html__( 'Borders', 'chia-lite' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'chia-lite-separator-thick',
				'label' => esc_html__( 'Thick', 'chia-lite' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'chia-lite-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'chia-lite' ),
			)
		);
	}
	add_action( 'init', 'chia_lite_register_block_styles' );
}
