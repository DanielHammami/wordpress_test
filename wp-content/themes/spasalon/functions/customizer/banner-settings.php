<?php 
// banner settings
function spasalon_banner_customizer( $wp_customize ){
	
	/* banner settings */
	$wp_customize->add_panel( 'banner_settings', array(
		'priority'       => 132,
		'capability'     => 'edit_theme_options',
		'title'      => esc_html__('Banner settings', 'spasalon'),
	) );
	
		/* category */
		$wp_customize->add_section( 'banner_cat_section' , array(
			'title'      => esc_html__('Category', 'spasalon'),
			'panel'  => 'banner_settings'
		) );
		
			// category banner title1
			$wp_customize->add_setting( 'spa_theme_options[banner_title_one_category]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_one_category]' , array(
			'label'          => esc_html__( 'Title', 'spasalon' ),
			'section'        => 'banner_cat_section',
			'type'           => 'text',
			) );
			
			// category banner title2
			$wp_customize->add_setting( 'spa_theme_options[banner_title_two_category]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_two_category]' , array(
			'label'          => esc_html__( 'Subtitle', 'spasalon' ),
			'section'        => 'banner_cat_section',
			'type'           => 'text',
			) );
			
			// category banner desc
			$wp_customize->add_setting( 'spa_theme_options[banner_description_category]' , array(
			'sanitize_callback' => 'sanitize_textarea_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_description_category]' , array(
			'label'          => esc_html__('Description', 'spasalon' ),
			'section'        => 'banner_cat_section',
			'type'           => 'textarea',
			) );
			
		/* archive template page */
		$wp_customize->add_section( 'banner_archive_section' , array(
			'title'      => esc_html__('Archive', 'spasalon'),
			'panel'  => 'banner_settings'
		) );
		
			// archive banner title1
			$wp_customize->add_setting( 'spa_theme_options[banner_title_one_author]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_one_author]' , array(
			'label'          => esc_html__( 'Title', 'spasalon' ),
			'section'        => 'banner_archive_section',
			'type'           => 'text',
			) );
			
			// archive banner title2
			$wp_customize->add_setting( 'spa_theme_options[banner_title_two_author]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_two_author]' , array(
			'label'          => esc_html__( 'Subtitle', 'spasalon' ),
			'section'        => 'banner_archive_section',
			'type'           => 'text',
			) );
			
			// archive banner desc
			$wp_customize->add_setting( 'spa_theme_options[banner_description_author]' , array(
			'sanitize_callback' => 'sanitize_textarea_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_description_author]' , array(
			'label'          => esc_html__('Description', 'spasalon' ),
			'section'        => 'banner_archive_section',
			'type'           => 'textarea',
			) );
			
		/* Tag template page */
		$wp_customize->add_section( 'banner_tag_section' , array(
			'title'      => esc_html__('Tag', 'spasalon'),
			'panel'  => 'banner_settings'
		) );
		
			// Tag banner title1
			$wp_customize->add_setting( 'spa_theme_options[banner_title_one_tag]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_one_tag]' , array(
			'label'          => esc_html__( 'Title', 'spasalon' ),
			'section'        => 'banner_tag_section',
			'type'           => 'text',
			) );
			
			// Tag banner title2
			$wp_customize->add_setting( 'spa_theme_options[banner_title_two_tag]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_two_tag]' , array(
			'label'          => esc_html__('Subtitle', 'spasalon' ),
			'section'        => 'banner_tag_section',
			'type'           => 'text',
			) );
			
			// Tag banner desc
			$wp_customize->add_setting( 'spa_theme_options[banner_description_tag]' , array(
			'sanitize_callback' => 'sanitize_textarea_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_description_tag]' , array(
			'label'          => esc_html__('Description', 'spasalon' ),
			'section'        => 'banner_tag_section',
			'type'           => 'textarea',
			) );
			
		/* Search template page */
		$wp_customize->add_section( 'banner_search_section' , array(
			'title'      => esc_html__('Search', 'spasalon'),
			'panel'  => 'banner_settings'
		) );
		
			// Search banner title1
			$wp_customize->add_setting( 'spa_theme_options[banner_title_one_search]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_one_search]' , array(
			'label'          => esc_html__('Title', 'spasalon' ),
			'section'        => 'banner_search_section',
			'type'           => 'text',
			) );
			
			// Search banner title2
			$wp_customize->add_setting( 'spa_theme_options[banner_title_two_search]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_two_search]' , array(
			'label'          => esc_html__( 'Subtitle', 'spasalon' ),
			'section'        => 'banner_search_section',
			'type'           => 'text',
			) );
			
			// Search banner desc
			$wp_customize->add_setting( 'spa_theme_options[banner_description_search]' , array(
			'sanitize_callback' => 'sanitize_textarea_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_description_search]' , array(
			'label'          => esc_html__('Description', 'spasalon' ),
			'section'        => 'banner_search_section',
			'type'           => 'textarea',
			) );
			
		/* 404 template page */
		$wp_customize->add_section( 'banner_404_section' , array(
			'title'      => esc_html__('404', 'spasalon'),
			'panel'  => 'banner_settings'
		) );
		
			// 404 banner title1
			$wp_customize->add_setting( 'spa_theme_options[banner_title_one_404]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_one_404]' , array(
			'label'          => esc_html__('Title', 'spasalon' ),
			'section'        => 'banner_404_section',
			'type'           => 'text',
			) );
			
			// 404 banner title2
			$wp_customize->add_setting( 'spa_theme_options[banner_title_two_404]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_two_404]' , array(
			'label'          => esc_html__( 'Subtitle', 'spasalon' ),
			'section'        => 'banner_404_section',
			'type'           => 'text',
			) );
			
			// 404 banner desc
			$wp_customize->add_setting( 'spa_theme_options[banner_description_404]' , array(
			'sanitize_callback' => 'sanitize_textarea_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_description_404]' , array(
			'label'          => esc_html__( 'Description', 'spasalon' ),
			'section'        => 'banner_404_section',
			'type'           => 'textarea',
			) );
			
		/* woo template page */
		$wp_customize->add_section( 'banner_woo_section' , array(
			'title'      => esc_html__('WooCommerce', 'spasalon'),
			'panel'  => 'banner_settings'
		) );
		
			// woo banner title1
			$wp_customize->add_setting( 'spa_theme_options[banner_title_one_woo]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_one_woo]' , array(
			'label'          => esc_html__( 'Title', 'spasalon' ),
			'section'        => 'banner_woo_section',
			'type'           => 'text',
			) );
			
			// woo banner title2
			$wp_customize->add_setting( 'spa_theme_options[banner_title_two_woo]' , array(
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_title_two_woo]' , array(
			'label'          => esc_html__( 'Subtitle', 'spasalon' ),
			'section'        => 'banner_woo_section',
			'type'           => 'text',
			) );
			
			// woo banner desc
			$wp_customize->add_setting( 'spa_theme_options[banner_description_woo]' , array(
			'sanitize_callback' => 'sanitize_textarea_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('spa_theme_options[banner_description_woo]' , array(
			'label'          => esc_html__( 'Description', 'spasalon' ),
			'section'        => 'banner_woo_section',
			'type'           => 'textarea',
			) );
	
}
add_action( 'customize_register', 'spasalon_banner_customizer' );