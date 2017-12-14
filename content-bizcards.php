<?php
/**
 * Template used to display single post bizcard content on single or archive pages
 *
 * @package DD
 * @since 0.2.0
 */

?>


<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

  <?php

          echo do_shortcode('[daisy_bizcard_display_before]');

  				the_content();

  				the_excerpt();

          echo do_shortcode('[daisy_bizcard_display_after]');


	?>

</div> <!-- #post-## -->
