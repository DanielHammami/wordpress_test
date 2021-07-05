<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Bloz
 */

// Get the content type.
$recent_slider = get_theme_mod( 'bloz_recent_slider', 'disable' );
// Bail if the section is disabled.
if ( 'disable' === $recent_slider ) {
	return;
}

$get_content = bloz_get_section_content( 'recent_slider', $recent_slider, 2 );

?>

<div id="recent-slider">
    <div class="regular" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1500, "dots": true, "arrows": true, "autoplay": false, "draggable": true, "fade": false }'>

        <?php foreach ( $get_content as $content ): ?>

        <article style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( $content['id'] ) ) ; ?>');">
            <div class="overlay"></div>
            <div class="post-wrapper">
                <div class="entry-container">
                    <div class="entry-meta">
                        <span class="cat-links">
                            <?php the_category( '', '', $content['id'] ) ?>
                        </span>
                    </div><!-- .entry-meta -->

                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>" tabindex="0"><?php echo esc_html( $content['title'] ); ?></a></h2>
                        <div class="seperator"></div>
                    </header>

                </div><!-- .entry-container -->
            </div>
        </article>

        <?php endforeach;  ?>


    </div>
</div><!-- #recent-slider -->


