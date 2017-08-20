<?php

//remove p tags and add h1 tags to the content
add_filter('the_content', 'daisy_remove_p_tags', 0);
add_filter('the_content', 'daisy_content_tags', 10);

wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );

function daisy_content_tags($content){
  if('bizcards'== get_post_type(get_the_ID()) && is_single() && is_main_query() && in_the_loop()){
    $elem_s = "<h1 class='bizcard-entry-title'>";
    $elem_e = "</h1>";
    $content = $elem_s . $content . $elem_e;
  }
  return $content;
}

function daisy_remove_p_tags($content){
  if('bizcards'==get_post_type(get_the_ID()) && is_single() && is_main_query() && in_the_loop()){
  remove_filter('the_content', 'wpautop');
  }
  return $content;
}

//remove p tags and add h2 tags to the excerpt
add_filter('the_excerpt', 'daisy_excerpt_p_tags', 0);
add_filter('the_excerpt', 'daisy_excerpt_tags', 10);
function daisy_excerpt_tags($content){
  if('bizcards'== get_post_type(get_the_ID()) && is_single() && is_main_query() && in_the_loop()){
    $elem_s = "<h2 class='bizcard-entry-excerpt'>";
    $elem_e = "</h2>";
    $content =  $elem_s . $content . $elem_e;
  }
  return $content;
}

function daisy_excerpt_p_tags($content){
  if('bizcards'==get_post_type(get_the_ID()) && is_single() && is_main_query() && in_the_loop()){
  remove_filter('the_excerpt', 'wpautop');
  }
  return $content;
}
