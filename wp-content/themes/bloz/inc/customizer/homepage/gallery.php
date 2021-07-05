<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Bloz
 *
 * gallery section
 */

$wp_customize->add_section(
	'bloz_gallery',
	array(
		'title' => esc_html__( 'Gallery Section', 'bloz' ),
		'panel' => 'bloz_home_panel',
	)
);

// gallery enable settings
$wp_customize->add_setting(
	'bloz_gallery',
	array(
		'sanitize_callback' => 'bloz_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'bloz_gallery',
	array(
		'section'		=> 'bloz_gallery',
		'label'			=> esc_html__( 'Content type:', 'bloz' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'bloz' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'bloz' ),
				'post' => esc_html__( 'Post', 'bloz' ),
		 	)
	)
);

for ($i=1; $i <= 4; $i++) { 
	// gallery post setting
	$wp_customize->add_setting(
		'bloz_gallery_post_'.$i,
		array(
			'sanitize_callback' => 'bloz_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'bloz_gallery_post_'.$i,
		array(
			'section'		=> 'bloz_gallery',
			'label'			=> esc_html__( 'Post ', 'bloz' ).$i,
			'active_callback' => 'bloz_if_gallery_enabled',
			'type'			=> 'select',
			'choices'		=> bloz_get_post_choices(),
		)
	);

}
