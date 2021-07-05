<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Bloz
 */

// Get the content type.
$gallery = get_theme_mod( 'bloz_gallery', 'disable' );
// Bail if the section is disabled.
if ( 'disable' === $gallery ) {
    return;
}

$get_content = bloz_get_section_content( 'gallery', $gallery, 4 );

?>

<div id="gallery" class="pt padding">
    <div class="container">
        <div class="section-content grid">

            <?php foreach ( $get_content as $content ): ?>

           <article class="grid-item">
                <div class="featured-image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( $content['id'] ) ) ; ?>');">
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
                            </header>

                            <div class="entry-content">
                                <div class="footer-meta">
                                    <?php 

                                    bloz_post_author() ;

                                    bloz_posted_on( $content['id'] );

                                    ?>

                                    <span class="comment"><a class="url fn n" href="<?php echo esc_url( $content['url'] ); ?>"><?php echo get_comments_number( $content['id'] ); ?></a></span>
                               
                                </div><!-- .entry-meta -->
                            </div><!-- .entry-content -->

                        </div><!-- .entry-container -->
                    </div>
                </div><!-- .dish-item-wrapper -->
            </article>

             <?php endforeach;  ?>

        </div><!-- .section-content -->
    </div><!-- .container -->
</div><!-- #portfolio -->

