<article class="media post not-found"> 
	
	<div class="media-body"> 
	
		<div class="entry-header">
			<h3 class="entry-title"><?php esc_html_e('Nothing Found', 'spasalon' ); ?></h3>
		</div>
		
		<div class="entry-content">
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'spasalon' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			
			<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.','spasalon' ); ?></p>
			
			<?php get_search_form(); ?>

			<?php else : ?>

				<p><?php esc_html_e("It seems we can't find what you are looking for. Perhaps searching can help.","spasalon"); ?></p>
				<?php get_search_form(); ?>

			<?php endif; ?>
			
		</div>
		
	</div> 
</article>