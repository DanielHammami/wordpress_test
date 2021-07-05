<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Bloz
 *
 * latest_posts section
 */
$wp_customize->add_section(
	'bloz_latest_posts',
	array(
		'title' => esc_html__( 'Latest Article', 'bloz' ),
		'panel' => 'bloz_home_panel',
	)
);

// blog enable settings
$wp_customize->add_setting(
	'bloz_latest_posts',
	array(
		'sanitize_callback' => 'bloz_sanitize_select',
		'default' => 'disable',
	)
);
$wp_customize->add_control(
	'bloz_latest_posts',
	array(
		'section'		=> 'bloz_latest_posts',
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
	'bloz_latest_posts_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'LATEST ARTICLES', 'bloz' ),
		'transport'	=> 'postMessage',
	)
);

$wp_customize->add_control(
	'bloz_latest_posts_title',
	array(
		'section'		=> 'bloz_latest_posts',
		'label'			=> esc_html__( 'Title:', 'bloz' ),
		'active_callback'	=> 'bloz_if_latest_posts_enabled',
	)
);

$wp_customize->selective_refresh->add_partial( 
	'bloz_latest_posts_title', 
	array(
        'selector'            => '#latest h2.section-title',
		'render_callback'     => 'bloz_latest_posts_partial_title',
	) 
);

for ($i=1; $i <= 1 ; $i++) {
	// blog post setting
	$wp_customize->add_setting(
		'bloz_latest_posts_post_'.$i,
		array(
			'sanitize_callback' => 'bloz_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control(
		'bloz_latest_posts_post_'.$i,
		array(
			'section'		=> 'bloz_latest_posts',
			'label'			=> esc_html__( 'Post ', 'bloz' ).$i,
			'active_callback' => 'bloz_if_latest_posts_enabled',
			'type'			=> 'select',
			'choices'		=> bloz_get_post_choices(),
		)
	);
	
}