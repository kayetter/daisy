<?php

//remove p tags and add h1 tags to the content
add_filter('the_content', 'daisy_remove_p_tags', 0);
add_filter('the_content', 'daisy_content_tags', 10);

//remove p tags and add h2 tags to the excerpt
add_filter('the_excerpt', 'daisy_remove_excerpt_p_tags', 0);
add_filter('the_excerpt', 'daisy_excerpt_tags', 10);

// add_filter('loop_shop_columns', 'loop_columns',999);
/**
 	 * Wraps post content in h1 tags if post_type = bizcards
 	 *
 	 * @hook filter 'the_content'
 	 * @param $content
 	 * @return $content
	 */
	function daisy_content_tags($content){
  if('bizcards'== get_post_type(get_the_ID())){
    $content = stripslashes($content);
    $elem_s = "<h1 class='bizcard-entry-title'>";
    $elem_e = "</h1>";
    $content = $elem_s . $content . $elem_e;
  }
  return $content;
}

/**
 	 * function that adds a filter to remove p tags on content if post_type =
 	 * bizcards.
 	 *
 	 * @hook filter 'the content'
 	 * @param $content  variable passed through hook
 	 * @return $content the modified content
	 */
function daisy_remove_p_tags($content){
  if('bizcards'==get_post_type(get_the_ID())){
  remove_filter('the_content', 'wpautop');
  }
  return $content;
}

/**
 	 * Wraps post excerpt in h2 tags if post_type = bizcards
 	 *
 	 * @hook filter 'the_excerpt'
 	 * @param $content
 	 * @return $content
	 */
function daisy_excerpt_tags($content){
  if('bizcards'== get_post_type(get_the_ID()) && in_the_loop()){
    $content = stripslashes($content);
    $elem_s = "<h2 class='bizcard-entry-excerpt'>";
    $elem_e = "</h2>";
    $content =  $elem_s . $content . $elem_e;
  }
  return $content;
}

/**
 	 * function that adds a filter to remove p tags on excerpt if post_type =
 	 * bizcards.
 	 *
 	 * @hook filter 'the_excerpt'
 	 * @param $content  variable passed through hook
 	 * @return $content the modified content
	 */
function daisy_remove_excerpt_p_tags($content){
  if('bizcards'==get_post_type(get_the_ID()) && in_the_loop()){
  remove_filter('the_excerpt', 'wpautop');
  }
  return $content;
}


/**
 	 * Creates 2 products per row for loop columns on WC_shop page
 	 *
 	 * @hook filter 'loop_shop_columns', 999
 	 * @return void
	 */
function loop_columns() {
	return 2; // 2 products per row
}
