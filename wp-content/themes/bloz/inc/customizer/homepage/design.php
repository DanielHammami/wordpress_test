<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Bloz
 *
 * design section
 */

$wp_customize->add_section(
	'bloz_design',
	array(
		'title' => esc_html__( 'Design and Fashion Section', 'bloz' ),
		'panel' => 'bloz_home_panel',
	)
);

// design enable settings
$wp_customize->add_setting(
	'bloz_design',
	array(
		'sanitize_callback' => 'bloz_sanitize_select',
		'default' => 'disable'
	)
);

$wp_customize->add_control(
	'bloz_design',
	array(
		'section'		=> 'bloz_design',
		'label'			=> esc_html__( 'Content type:', 'bloz' ),
		'description'			=> esc_html__( 'Choose where you want to render the content from.', 'bloz' ),
		'type'			=> 'select',
		'choices'		=> array( 
				'disable' => esc_html__( '--Disable--', 'bloz' ),
				'post' => esc_html__( 'Post', 'bloz' ),
		 	)
	)
);

$wp_customize->add_setting(
	'bloz_design_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
		'default'	=>  __('DESIGN AND FASHION', 'bloz'),
	)
);

$wp_customize->add_control(
	'bloz_design_title',
	array(
		'section'		=> 'bloz_design',
		'label'			=> esc_html__( 'Section Title:', 'bloz' ),		
		'active_callback' => 'bloz_if_design_enabled',
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'bloz_design_title', 
	array(
        'selector'            => '#design h2.section-title',
		'render_callback'     => 'bloz_design_partial_title',
	) 
);

for ($i=1; $i <= 4; $i++) { 
	// design post setting
	$wp_customize->add_setting(
		'bloz_design_post_'.$i,
		array(
			'sanitize_callback' => 'bloz_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'bloz_design_post_'.$i,
		array(
			'section'		=> 'bloz_design',
			'label'			=> esc_html__( 'Post ', 'bloz' ).$i,
			'active_callback' => 'bloz_if_design_enabled',
			'type'			=> 'select',
			'choices'		=> bloz_get_post_choices(),
		)
	);
	
}