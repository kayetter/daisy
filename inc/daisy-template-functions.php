<?php

function daisy_bizcard_header() {
  ?>
  <header class="entry-header bizcard-entry-header">
  <?php
  if ( is_single() ) {
    if ( has_post_thumbnail()) {
        the_post_thumbnail( 'full', array('class'=>'bizimg') );
      }
      the_content('<h1 class="entry-title bizcard-entry-title">', '</h1>');

  } else {

    the_content( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
  }
  ?>
  </header><!-- .entry-header -->
  <?php
}

//content for single post
function daisy_bizcard_content() {

  ?>
  <div class="entry-content bizcard-entry-content">
    <?php
    the_excerpt();
 ?>

    <a href="https://drd.cards/<?php echo esc_html(get_the_title()) ?>">
    <?php esc_url(the_title("https://drd.cards/","?".get_post_meta(get_the_ID(), 'dd_pin', true))); ?>
    </a>

  </div>
  <?php
  wp_link_pages( array(
    'before' => '<div class="page-links">' . __( 'Pages:', 'daisy' ),
    'after'  => '</div>',
  ) );
  ?>
  </div><!-- .entry-content -->
  <?php
}
