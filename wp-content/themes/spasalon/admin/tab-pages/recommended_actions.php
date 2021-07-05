<?php  
	$spasalon_actions = $this->recommended_actions;
	$spasalon_actions_todo = get_option( 'recommended_actions', false );
?>
<div id="recommended_actions" class="spasalon-tab-pane panel-close">
	<div class="action-list">
		<?php if($spasalon_actions): foreach ($spasalon_actions as $key => $spasalon_actionValue): ?>
		<div class="action" id="<?php echo esc_attr($spasalon_actionValue['id']); ?>">
			<div class="recommended_box col-md-6 col-sm-6 col-xs-12">
				<img width="772" height="180" src="<?php echo esc_url(SPASALON_TEMPLATE_DIR_URI.'/images/'.str_replace(' ', '-', strtolower($spasalon_actionValue['title'])).'.png');?>">
				<div class="action-inner">
					<h3 class="action-title"><?php echo esc_html($spasalon_actionValue['title']); ?></h3>
					<div class="action-desc"><?php echo esc_html($spasalon_actionValue['desc']); ?></div>
					<?php echo wp_kses_post($spasalon_actionValue['link']); ?>
					<div class="action-watch">
						<?php if(!$spasalon_actionValue['is_done']): ?>
							<?php if(!isset($spasalon_actions_todo[$spasalon_actionValue['id']]) || !$spasalon_actions_todo[$spasalon_actionValue['id']]): ?>
								<span class="dashicons dashicons-visibility"></span>
							<?php else: ?>
								<span class="dashicons dashicons-hidden"></span>
							<?php endif; ?>
						<?php else: ?>
							<span class="dashicons dashicons-yes"></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; endif; ?>
	</div>
</div>