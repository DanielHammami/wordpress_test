<?php 
// sidebars
add_action( 'widgets_init', 'spasalon_widgets_init' );
function spasalon_widgets_init(){
	
	$spasalon_current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), spasalon_default_data() );
	$spasalon_service_layout = 12 / $spasalon_current_options['service_layout'];
	$spasalon_news_layout = 12 / $spasalon_current_options['news_layout'];
	
	register_sidebar( array(
	'name' => esc_html__( 'Sidebar widget area', 'spasalon' ),
	'id' => 'sidebar-1',
	'description' => esc_html__('Sidebar widget area','spasalon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );

	register_sidebar( array(
	'name' => esc_html__( 'Project content widget area', 'spasalon' ),
	'id' => 'project-widget-section',
	'description' => esc_html__( 'Project content widget area', 'spasalon' ),
	'before_widget' => '<div id="%1$s" class="widget item-product  %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
	) );
	
	register_sidebar( array(
	'name' => esc_html__( 'News section widget area', 'spasalon' ),
	'id' => 'news-widget-section',
	'description' => esc_html__( 'News section widget area', 'spasalon' ),
	'before_widget' => '<div id="%1$s" class="col-md-'.$spasalon_news_layout.' widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
	) );
	
	register_sidebar( array(
	'name' => esc_html__( 'Footer sidebar one', 'spasalon' ),
	'id' => 'footer-sidebar1',
	'description' => esc_html__( 'Footer sidebar one', 'spasalon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
	'name' => esc_html__( 'Footer sidebar two', 'spasalon' ),
	'id' => 'footer-sidebar2',
	'description' => esc_html__( 'Footer sidebar two', 'spasalon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
	'name' => esc_html__( 'Footer sidebar three', 'spasalon' ),
	'id' => 'footer-sidebar3',
	'description' => esc_html__( 'Footer sidebar three', 'spasalon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
	'name' => esc_html__( 'Footer sidebar four', 'spasalon' ),
	'id' => 'footer-sidebar4',
	'description' => esc_html__( 'Footer sidebar four', 'spasalon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
	'name' => esc_html__( 'Woocommerce sidebar widget area', 'spasalon' ),
	'id' => 'woocommerce-1',
	'description' => esc_html__( 'Woocommerce sidebar widget area', 'spasalon' ),
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>'
	) );
	
}?>