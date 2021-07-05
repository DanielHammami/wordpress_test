<?php

if (!defined('ABSPATH')) {
	exit;
}

/***** Welcome Notice in WordPress Dashboard *****/

if (!function_exists('chia_lite_admin_notice')) {
	function chia_lite_admin_notice() {
		global $pagenow, $chia_lite_version;
		if (current_user_can('edit_theme_options') && 'index.php' === $pagenow && !get_option('chia_lite_notice_welcome') || current_user_can('edit_theme_options') && 'themes.php' === $pagenow && isset($_GET['activated']) && !get_option('chia_lite_notice_welcome')) {
			wp_enqueue_style('chia-lite-admin-notice', get_template_directory_uri() . '/admin/admin-notice.css', array(), $chia_lite_version);
			chia_lite_welcome_notice();
		}
	}
}
add_action('admin_notices', 'chia_lite_admin_notice');

/***** Hide Welcome Notice in WordPress Dashboard *****/

if (!function_exists('chia_lite_hide_notice')) {
	function chia_lite_hide_notice() {
		if (isset($_GET['chia-lite-hide-notice']) && isset($_GET['_chia_lite_notice_nonce'])) {
			if (!wp_verify_nonce($_GET['_chia_lite_notice_nonce'], 'chia_lite_hide_notices_nonce')) {
				wp_die(esc_html__('Action failed. Please refresh the page and retry.', 'chia-lite'));
			}
			if (!current_user_can('edit_theme_options')) {
				wp_die(esc_html__('You do not have the necessary permission to perform this action.', 'chia-lite'));
			}
			$hide_notice = sanitize_text_field($_GET['chia-lite-hide-notice']);
			update_option('chia_lite_notice_' . $hide_notice, 1);
		}
	}
}
add_action('wp_loaded', 'chia_lite_hide_notice');

/***** Content of Welcome Notice in WordPress Dashboard *****/

if (!function_exists('chia_lite_welcome_notice')) {
	function chia_lite_welcome_notice() {
		global $chia_lite_data; ?>
		<div class="notice notice-success chia-welcome-notice">
			<a class="notice-dismiss chia-welcome-notice-hide" href="<?php echo esc_url(wp_nonce_url(remove_query_arg(array('activated'), add_query_arg('chia-lite-hide-notice', 'welcome')), 'chia_lite_hide_notices_nonce', '_chia_lite_notice_nonce')); ?>">
				<span class="screen-reader-text">
					<?php echo esc_html__('Dismiss this notice.', 'chia-lite'); ?>
				</span>
			</a>
			<p><?php esc_html_e('Thanks for choosing Chia Lite! To get started please make sure you visit our welcome page.', 'chia-lite');?></p>
			<p class="chia-welcome-notice-button">
				<a class="button-secondary" href="<?php echo esc_url(admin_url('themes.php?page=charity')); ?>">
				<?php
					/* translators: %s: Chia Lite theme */
					printf( esc_html__( 'Get Started with %s', 'chia-lite' ), 'Chia Lite' );
				?>
				</a>
				<a class="button-primary" href="<?php echo esc_url( __( 'https://www.anarieldesign.com/themes/deli-cafe-wordpress-theme/', 'chia-lite' ) ); ?>" target="_blank">
					<?php esc_html_e( 'Upgrade to Chia PRO', 'chia-lite' ); ?>
				</a>
			</p>
		</div><?php
	}
}

/***** Theme Info Page *****/

if (!function_exists('chia_lite_theme_info_page')) {
	function chia_lite_theme_info_page() {
		add_theme_page(esc_html__('Welcome to Chia Lite', 'chia-lite'), esc_html__('Theme Info', 'chia-lite'), 'edit_theme_options', 'charity', 'chia_lite_display_theme_page');
	}
}
add_action('admin_menu', 'chia_lite_theme_info_page');

if (!function_exists('chia_lite_display_theme_page')) {
	function chia_lite_display_theme_page() {
		global $chia_lite_data; ?>
		<div class="theme-info-wrap">
			<h1>
				<?php printf(esc_html__('Welcome to Chia Lite', 'chia-lite')); ?>
			</h1>
			<div class="chia-row theme-intro clearfix">
				<div class="chia-col-1-4 screenshot">
					<img class="theme-screenshot" src="<?php echo esc_url(get_template_directory_uri() ); ?>/screenshot.png" alt="<?php esc_attr_e('Theme Screenshot', 'chia-lite'); ?>" />
				</div>
				<div class="chia-col-3-4 theme-description">
				    <p class="about">
						<?php printf(esc_html__('Chia Lite is a modern responsive WordPress theme ideal for creating a deli or cafe website as well as a food-based blog. It is extremely easy to set up and use thanks to seamless integration with the WordPress block editor. With its fresh look and smart color options you will have all the tools you need to create a website your visitors will love.', 'chia-lite')); ?>
					</p>
					<br>
				    <?php esc_html_e( 'Looking for more features, like WooCommerce support, more block patterns, header and blog options? Then you should definitely check the Pro version.', 'chia-lite' ); ?>
					<div class="theme-links wpz-clearfix">
					<p>
						<a href="https://www.anarieldesign.com/themes/deli-cafe-wordpress-theme/" class="button button-primary" target="_blank">
							<?php esc_html_e( 'Get Chia Pro &rarr;', 'chia-lite' ); ?>
						</a>
					</p>
				</div>
				</div>
			</div>
	
			<hr>
			<div class="theme-comparison">
			<h3 class="theme-comparison-intro">
				<?php esc_html_e( 'Chia Lite vs. Chia Pro', 'chia-lite' ); ?>
			</h3>
			<table>
				<thead class="theme-comparison-header">
					<tr>
						<th class="table-feature-title"><h3><?php esc_html_e( 'Features', 'chia-lite' ); ?></h3></th>
						<th><h3><?php esc_html_e( 'Chia Lite', 'chia-lite' ); ?></h3></th>
						<th><h3><?php esc_html_e( 'Chia Pro', 'chia-lite' ); ?></h3></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><h3><?php esc_html_e( 'Responsive Layout', 'chia-lite' ); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Live Customizer', 'chia-lite' ); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'RTL Support', 'chia-lite' ); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Accessibility Ready', 'chia-lite' ); ?></h3></td>
						<td><span class="dashicons dashicons-yes"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Header Options', 'chia-lite' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Blog Options', 'chia-lite' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Top Info Bar', 'chia-lite' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Demo Content Importer', 'chia-lite' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>

					<tr>
						<td><h3><?php esc_html_e( 'WooCommerce Style Support', 'chia-lite' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Testimonials', 'chia-lite' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Extensive Number of Custom Block Patterns', 'chia-lite' ); ?></h3></td>
						<td><span class="dashicons dashicons-no"></span></td>
						<td><span class="dashicons dashicons-yes"></span></td>
					</tr>
					<tr>
						<td><h3><?php esc_html_e( 'Support', 'chia-lite' ); ?></h3></td>
						<td><?php esc_html_e( 'Support Forum', 'chia-lite' ); ?></td>
						<td><?php esc_html_e( 'Premium Support via HelpDesk', 'chia-lite' ); ?></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>
							<a href="https://www.anarieldesign.com/themes/deli-cafe-wordpress-theme/" target="_blank" class="upgrade-button">
								<?php esc_html_e( 'Upgrade to Chia PRO', 'chia-lite' ); ?>
							</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		</div><?php
	}
}

?>