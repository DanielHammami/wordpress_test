<?php
/**
 * Global Layout
 */
// Global Layout
$wp_customize->add_section(
	'bloz_global_layout',
	array(
		'title' => esc_html__( 'Global Layout', 'bloz' ),
		'panel' => 'bloz_general_panel',
	)
);

// Global archive layout setting
$wp_customize->add_setting(
	'bloz_archive_sidebar',
	array(
		'sanitize_callback' => 'bloz_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'bloz_archive_sidebar',
	array(
		'section'		=> 'bloz_global_layout',
		'label'			=> esc_html__( 'Archive Sidebar', 'bloz' ),
		'description'			=> esc_html__( 'This option works on all archive pages like: 404, search, date, category, "Your latest posts" and so on.', 'bloz' ),
		'type'			=> 'radio',
		'choices'		=> array(  
			'right' => esc_html__( 'Right', 'bloz' ), 
			'no' => esc_html__( 'No Sidebar', 'bloz' ), 
		),
	)
);

// Global page layout setting
$wp_customize->add_setting(
	'bloz_global_page_layout',
	array(
		'sanitize_callback' => 'bloz_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'bloz_global_page_layout',
	array(
		'section'		=> 'bloz_global_layout',
		'label'			=> esc_html__( 'Global page sidebar', 'bloz' ),
		'description'			=> esc_html__( 'This option works only on single pages including "Posts page". This setting can be overridden for single page from the metabox too.', 'bloz' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'right' => esc_html__( 'Right', 'bloz' ), 
			'no' => esc_html__( 'No Sidebar', 'bloz' ), 
		),
	)
);

// Global post layout setting
$wp_customize->add_setting(
	'bloz_global_post_layout',
	array(
		'sanitize_callback' => 'bloz_sanitize_select',
		'default' => 'right',
	)
);

$wp_customize->add_control(
	'bloz_global_post_layout',
	array(
		'section'		=> 'bloz_global_layout',
		'label'			=> esc_html__( 'Global post sidebar', 'bloz' ),
		'description'			=> esc_html__( 'This option works only on single posts. This setting can be overridden for single post from the metabox too.', 'bloz' ),
		'type'			=> 'radio',
		'choices'		=> array( 
			'right' => esc_html__( 'Right', 'bloz' ), 
			'no' => esc_html__( 'No Sidebar', 'bloz' ), 
		),
	)
);