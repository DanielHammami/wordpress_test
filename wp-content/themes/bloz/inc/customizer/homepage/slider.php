<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Bloz
 *
 * slider section
 */

$wp_customize->add_section(
	'bloz_slider',
	array(
		'title' => esc_html__( 'Slider Section', 'bloz' ),
		'panel' => 'bloz_home_panel',
	)
);

// slider enable settings
$wp_customize->add_setting(
	'bloz_slider',
	array(
		'sanitize_callback' => 'bloz_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'bloz_slider',
	array(
		'section'		=> 'bloz_slider',
		'label'			=> esc_html__( 'Content type:', 'bloz' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'bloz' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'bloz' ),
				'post' => esc_html__( 'Post', 'bloz' ),
		 	)
	)
);

for ($i=1; $i <= 3; $i++) { 
	// slider post setting
	$wp_customize->add_setting(
		'bloz_slider_post_'.$i,
		array(
			'sanitize_callback' => 'bloz_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'bloz_slider_post_'.$i,
		array(
			'section'		=> 'bloz_slider',
			'label'			=> esc_html__( 'Post ', 'bloz' ).$i,
			'active_callback' => 'bloz_if_slider_enabled',
			'type'			=> 'select',
			'choices'		=> bloz_get_post_choices(),
		)
	);
}
