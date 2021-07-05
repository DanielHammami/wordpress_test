<?php
/**
 * Getting started template
 */
?>

<div id="getting_started" class="spasalon-tab-pane active">

	<div class="container-fluid">
		
		<div class="row">
			<div class="col-md-6">
				<div class="spasalon-tab-pane-half spasalon-tab-pane-first-half">
					<h3><?php esc_html_e( "Recommended Plugins", 'spasalon' ); ?></h3>
					<div style="border-top: 1px solid #eaeaea;">
						<p style="margin-top: 16px;">
							<?php esc_html_e( 'To take full advanctage of the theme features you need to install recommended plugins.', 'spasalon' ); ?>
						
						</p>
						<p><a target="_self" href="#recommended_actions" class="spasalon-custom-class"><?php esc_html_e( 'Click here','spasalon');?></a></p>
					</div>
				</div>

				<div class="spasalon-tab-pane-half spasalon-tab-pane-first-half">
					<h3><?php esc_html_e( "Start Customizing", 'spasalon' ); ?></h3>
					<div style="border-top: 1px solid #eaeaea;">
						<p style="margin-top: 16px;">
							<?php esc_html_e( 'After activating recommended plugins , now you can start customization.', 'spasalon' ); ?>
						
						</p>
						<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer','spasalon');?></a></p>
					</div>
				</div>

				<div class="spasalon-tab-pane-half spasalon-tab-pane-first-half">
					<h3><?php esc_html_e( "Documentation", 'spasalon' ); ?></h3>
					<div style="border-top: 1px solid #eaeaea;">
						<p style="margin-top: 16px;">
							<?php esc_html_e( 'Browse the documention for the detailed information regarding this theme.', 'spasalon' ); ?>
						
						</p>
						<p><a target="_blank" href="<?php echo esc_url('https://help.webriti.com/themes/spasalon/spasalon-wordpress-theme/'); ?>"><?php esc_html_e( 'Documentation','spasalon');?></a></p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="spasalon-tab-pane-half spasalon-tab-pane-first-half">
				<img src="<?php echo esc_url( SPASALON_TEMPLATE_DIR_URI ) . '/admin/img/spasalon.png'; ?>" alt="<?php esc_attr_e( 'spasalon Theme', 'spasalon' ); ?>" />
				</div>
			</div>	
		</div>
		<div class="row">
			<div class="spasalon-tab-center">
				<h3><?php esc_html_e( "Useful Links", 'spasalon' ); ?></h3>
			</div>
			<div class=" useful_box">
                <div class="spasalon-tab-pane-half spasalon-tab-pane-first-half">
                    <a href="<?php echo esc_url('https://webriti.com/demo/wp/lite/spasalon'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-desktop info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('Lite Demo','spasalon'); ?></p>
                	</a>
                    <a href="<?php echo esc_url('https://webriti.com/demo/wp/preview/?prev=spasalon'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-desktop info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('PRO Demo','spasalon'); ?></p>
                    </a>        
                </div>
                <div class="spasalon-tab-pane-half spasalon-tab-pane-first-half">
                    <a href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/spasalon'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-smiley info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('Your feedback is valuable to us','spasalon'); ?></p>
                    </a>
                    <a href="<?php echo esc_url('https://webriti.com/spasalon/'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-book-alt info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('Premium Theme Details','spasalon'); ?></p>
                    </a>
                </div>
            </div>        
        </div>            
    </div>
</div>

