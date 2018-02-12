<?php
/**
 * Shortcodes used with daisy theme
 *
 *
 * @package Daisy theme
 * @since 1.0.2
 */

 /**
  * A shortcode to link to other posts
  *
  * @package Daisy theme
  * @return string anchor link for intended post
  * @since 1.0.2
  */
add_shortcode('get_permalink','get_daisy_permalink');
function get_daisy_permalink($atts){

  extract( shortcode_atts( array(
  'slug' => "help",

  ), $atts ) );

  $post_id = daisy_get_post_id_by_slug($slug);
  if($post_id){
      ob_start();
    ?>
    <a  href="<?php echo get_permalink($post_id) ?>" ><?php echo get_the_title($post_id) ?></a>

    <?php
    return ob_get_clean();
  }

}
