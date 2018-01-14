<?php
/**
 * Functions hooked to wordpress actions and filters
 * @since 0.2.0
 * @package dopeydaisy
 */


function apply_category_single($single_template){
  global $post;
  if(is_post_help($post->ID)){
    $single_template = get_stylesheet_directory()."/category.php";
  }
  return $single_template;
}
add_filter( "single_template", "apply_category_single");
