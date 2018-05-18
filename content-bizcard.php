<?php
/**
 * Template used to display single post bizcard content on single or archive pages
 *
 * @package DD
 * @since 0.2.0
 */
 global $post;
?>


<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

  <?php

          echo do_shortcode('[daisy_bizcard_display_before]');

  				the_content();

  				the_excerpt();

    		if((isset($_GET[get_post_meta($post->ID,"dd_pin",true)]) && get_post_status() == "publish") || (get_post_field( 'post_author', $post->ID) ==  get_current_user_id()) || current_user_can("delete_plugins")):

          echo do_shortcode('[daisy_bizcard_display_after]');

        endif;

	?>

</div> <!-- #post-## -->
