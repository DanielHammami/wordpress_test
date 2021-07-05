<?php
/**
 * Theme Ostrich widgets inclusion
 *
 * This is the template that includes all custom widgets of Bloz
 *
 * @package Theme Ostrich
 * @subpackage Bloz
 * @since Bloz 1.0.0
 */

/*
 * Add Latest Posts widget
 */
require get_template_directory() . '/inc/widgets/latest-posts-widget.php';
require get_template_directory() . '/inc/widgets/about-widgets.php';


/**
 * Register widgets
 */
function bloz_register_widgets() {

	register_widget( 'Bloz_Latest_Post' );
	register_widget( 'Bloz_About_Us_Image_Widget' );

}
add_action( 'widgets_init', 'bloz_register_widgets' );