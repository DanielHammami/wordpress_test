<?php //Pro Details
function spasalon_pro_feature_customizer( $wp_customize ) {
class Spasalon_Pro__Feature_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <div class="spasalon-pro-features-customizer">
    <ul class="spasalon-pro-features">
        <li>
            <span class="spasalon-pro-label"><?php esc_html_e( 'PRO','spasalon' ); ?></span>
            <?php esc_html_e( 'Advance Theme Style Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php esc_html_e( 'PRO','spasalon' ); ?></span>
            <?php esc_html_e( 'Page Banner Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php esc_html_e( 'PRO','spasalon' ); ?></span>
            <?php esc_html_e( 'Slider Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php esc_html_e( 'PRO','spasalon' ); ?></span>
            <?php esc_html_e( 'Product Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php esc_html_e( 'PRO','spasalon' ); ?></span>
            <?php esc_html_e( 'Testimonial Section','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php esc_html_e( 'PRO','spasalon' ); ?></span>
            <?php esc_html_e( 'Latest News Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php esc_html_e( 'PRO','spasalon' ); ?></span>
            <?php esc_html_e( 'Team Section','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php esc_html_e( 'PRO','spasalon' ); ?></span>
            <?php esc_html_e( 'Gallery Section','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php esc_html_e( 'PRO','spasalon' ); ?></span>
            <?php esc_html_e( 'Client Section','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php esc_html_e( 'PRO','spasalon' ); ?></span>
            <?php esc_html_e( 'Callout Section','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php esc_html_e( 'PRO','spasalon' ); ?></span>
            <?php esc_html_e( 'Additional Section Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php esc_html_e( 'PRO','spasalon' ); ?></span>
            <?php esc_html_e( 'About us Page Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php esc_html_e( 'PRO','spasalon' ); ?></span>
            <?php esc_html_e( 'Service Page Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php esc_html_e( 'PRO','spasalon' ); ?></span>
            <?php esc_html_e( 'Contact Page Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php esc_html_e( 'PRO','spasalon' ); ?></span>
            <?php esc_html_e( 'Section Reordering','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php esc_html_e( 'PRO','spasalon' ); ?></span>
            <?php esc_html_e( 'Typography Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php esc_html_e( 'PRO','spasalon' ); ?></span>
            <?php esc_html_e( 'SEO Friendly URL Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php esc_html_e( 'PRO','spasalon' ); ?></span>
            <?php esc_html_e( 'Support for WPML / Polylang','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php esc_html_e( 'PRO','spasalon' ); ?></span>
            <?php esc_html_e( 'Quality Support','spasalon' ); ?>
        </li>
    </ul>
    <a target="_blank" href="<?php echo esc_url('https://webriti.com/spasalon/');?>" class="spasalon-pro-button button-primary"><?php esc_html_e( 'UPGRADE TO PRO','spasalon' ); ?></a>
    <hr>
</div>
    <?php
    }
}
$wp_customize->add_section( 'spasalon_pro_feature_section' , array(
		'title'      => esc_html__('View PRO Details', 'spasalon'),
		'priority'   => 1,
   	) );

$wp_customize->add_setting(
    'upgrade_pro_feature',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Spasalon_Pro__Feature_Customize_Control( $wp_customize, 'upgrade_pro_feature', array(
		'section' => 'spasalon_pro_feature_section',
		'setting' => 'upgrade_pro_feature',
    ))
);
class Spasalon_Feature_document_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
   
     <div class="spasalon-pro-content">
        <ul class="spasalon-pro-des">
            <li> 
                <?php esc_html_e('Select among predefined color skins, you can even create yours without writing any CSS code.','spasalon');?>
            </li>
            <li> 
                <?php esc_html_e('Using page banner settings manage page banner content and enable/disable page banner.','spasalon');?>
            </li>
            <li> 
                <?php esc_html_e('Pro version theme comes with add multiple slides in slider and you can select the slider enable / disable option, manage slider caption color etc.','spasalon');?>
            </li>
            <li> 
                <?php esc_html_e('Add multiple products and you can show product by category, etc.','spasalon');?>
            </li>
            <li> 
                <?php esc_html_e('Add multiple testimonials, show all your testimonials on the frontpage, change background of testimonial section, etc.','spasalon');?>
            </li>
            <li> 
                <?php esc_html_e('In Pro version you can show the latest news by category.','spasalon');?>
            </li>
            <li> 
                <?php esc_html_e('Show all your team members, gallery, clients and callout details on the frontpage.','spasalon');?>
            </li>
            <li> 
                <?php esc_html_e('Pro version comes with additional settings section, you can add content using widgets in this section.','spasalon');?>
            </li>
            <li> 
                <?php esc_html_e('Theme comes with about-us page, service page and contact page settings.','spasalon');?>
            </li>
            <li> 
                <?php esc_html_e('Theme Layout manager will helps you to rearrange the sections.','spasalon');?>
            </li>
            <li> 
                <?php esc_html_e('Typography will helps you to manage custom fonts like paragraph font, menu font etc.','spasalon');?>
            </li>
            <li> 
                <?php esc_html_e('You can change the URL slug using SEO friendly URL settings','spasalon');?>
            </li>
            <li> 
                <?php esc_html_e('Translation ready supporting popular plugins WPML / Polylang.','spasalon');?>
            </li>
            <li> 
                <?php esc_html_e('Dedicated support, various widget and sidebar management.','spasalon');?>
            </li>
        </ul>
     </div>
    <?php
    }
}

$wp_customize->add_setting(
    'doc_Review_feature',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new Spasalon_Feature_document_Customize_Control( $wp_customize, 'doc_Review_feature', array(	
		'section' => 'spasalon_pro_feature_section',
		'setting' => 'doc_Review_feature',
    ))
);

}
add_action( 'customize_register', 'spasalon_pro_feature_customizer' );