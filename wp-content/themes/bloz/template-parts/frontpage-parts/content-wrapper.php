<div id="content-wrapper" class="page-section">
	<div class="container">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php require get_template_directory() . '/template-parts/frontpage-parts/recent-slider.php'; ?>

				<?php require get_template_directory() . '/template-parts/frontpage-parts/blog.php'; ?>
				
			</main><!-- #main -->
		</div><!-- #primary -->

		<?php if ( is_active_sidebar( 'front-page-sidebar' ) ) { ?>
        <aside id="secondary" class="widget-area" role="complementary">
            <?php
                dynamic_sidebar( 'front-page-sidebar' );
            ?>
        </aside><!-- #secondary -->
    <?php } ?>
	</div><!-- .wrapper -->
</div><!-- #content-wrapper -->