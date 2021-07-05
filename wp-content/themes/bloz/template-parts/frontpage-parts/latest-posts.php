<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Bloz
 */

// Get the content type.
$latest_posts = get_theme_mod( 'bloz_latest_posts', 'disable' );
// Bail if the section is disabled.
if ( 'disable' === $latest_posts ) {
    return;
}
$section_title    = get_theme_mod( 'bloz_latest_posts_title', __( 'LATEST ARTICLES', 'bloz') ) ;
$get_content = bloz_get_section_content( 'latest_posts', $latest_posts, 1  );

?>

<div id="latest" class="padding">
  <div class="container">
    <?php if( !empty( $section_title ) ): ?>
      <div class="section-header">
        <h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
      </div><!-- .section-header -->
    <?php endif; ?>

    <div class="section-content">

      <?php foreach ( $get_content as $content ): ?>

        <article>
          <div class="entry-meta">
            <span class="cat-links">
              <?php the_category( '', '', $content['id'] ); ?>
            </span><!-- .cat-links -->
          </div><!-- .entry-meta -->

          <header class="entry-header">
            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ) ; ?>" tabindex="0"><?php echo esc_html( $content['title'] ); ?></a></h2>
          </header>

          <div class="featured-image" style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( $content['id'] ) ) ; ?>')"></div>

          <div class="entry-content">
           <p><?php echo esc_html( wp_trim_words( $content['content'], 40 ) ); ?></p>
         </div><!-- .entry-content -->

         <div class="footer-meta">
          
          <?php

          bloz_post_author() ;

          bloz_posted_on( $content['id'] );

          ?>

          <span class="comment"><a class="url fn n" href="<?php echo esc_url( $content['url'] ); ?>"><?php echo get_comments_number( $content['id'] ); ?></a></span>

        </div><!-- .entry-meta -->
      </article>

    <?php endforeach; ?>

  </div>
</div>
</div><!-- #latest-post -->