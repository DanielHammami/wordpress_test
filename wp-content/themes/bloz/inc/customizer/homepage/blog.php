<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Bloz
 *
 * blog_posts section
 */

$wp_customize->add_section(
	'bloz_blog_posts',
	array(
		'title' => esc_html__( 'Blog Posts Section', 'bloz' ),
		'panel' => 'bloz_home_panel',
	)
);

// blog_posts enable settings
$wp_customize->add_setting(
	'bloz_blog_posts',
	array(
		'sanitize_callback' => 'bloz_sanitize_select',
		'default' => 'post'
	)
);

$wp_customize->add_control(
	'bloz_blog_posts',
	array(
		'section'		=> 'bloz_blog_posts',
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
	'bloz_blog_posts_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'	=> 'postMessage',
		'default'	=>  __('Latest Blog', 'bloz'),
	)
);

$wp_customize->add_control(
	'bloz_blog_posts_title',
	array(
		'section'		=> 'bloz_blog_posts',
		'label'			=> esc_html__( 'Section Title:', 'bloz' ),		
		'active_callback' => 'bloz_if_blog_posts_enabled',
		
	)
);

$wp_customize->selective_refresh->add_partial( 
	'bloz_blog_posts_title', 
	array(
        'selector'            => '#our-blog h2.section-title',
		'render_callback'     => 'bloz_blog_posts_partial_title',
	) 
);

for ($i=1; $i <= 3; $i++) { 
	// blog_posts post setting
	$wp_customize->add_setting(
		'bloz_blog_posts_post_'.$i,
		array(
			'sanitize_callback' => 'bloz_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'bloz_blog_posts_post_'.$i,
		array(
			'section'		=> 'bloz_blog_posts',
			'label'			=> esc_html__( 'Post ', 'bloz' ).$i,
			'active_callback' => 'bloz_if_blog_posts_enabled',
			'type'			=> 'select',
			'choices'		=> bloz_get_post_choices(),
		)
	);

}