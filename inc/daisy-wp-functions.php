<?php
/**
 * Functions Hooked to Daisy Actions and Filters
 *
 *
 * @package Daisy theme
 * @since 0.2.0
 */

 add_action( 'wp_enqueue_scripts', 'load_daisy_styles');
 function load_daisy_styles(){
     wp_enqueue_style('daisy-fonts', daisy_fonts_url(), DAISY_THEME_VERSION);
     wp_enqueue_style('storefront', get_template_directory_uri()."/style.css", DAISY_THEME_VERSION);
     wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css',DAISY_THEME_VERSION
    );
     wp_enqueue_script('daisy_theme_scripts', get_stylesheet_directory_uri()."/inc/js/daisy_theme_scripts.js",DAISY_THEME_VERSION);
 }




 // remove woocommerce styles
 // add_filter( 'woocommerce_enqueue_styles', '__return_false' );



 //add poppins and quicksand
 function daisy_fonts_url() {
     	$fonts_url = '';

     	/*
     	 * Translators: If there are characters in your language that are not
     	 * supported by quicksand, Poppins this to 'off'. Do not translate
     	 * into your own language.
     	 */

     	$quicksand = _x( 'on', 'Quicksand font: on or off', 'daisy' );
     	$poppins = _x( 'on', 'Poppins font: on or off', 'daisy' );
     	$raleway = _x( 'on', 'Raleway font: on or off', 'daisy' );
     	$PTSans = _x( 'on', 'PTSans font: on or off', 'daisy' );


     		$font_families = array();
             if ( 'off' !== $quicksand ) {

     		$font_families[] = 'Quicksand:400,500,700';
     	}

             if ( 'off' !== $poppins ) {

     		$font_families[] = 'Poppins:400,700';
     	}
             if ( 'off' !== $raleway ) {

     		$font_families[] = 'Raleway:400,500,700';
     	}
             if ( 'off' !== $PTSans ) {

     		$font_families[] = 'PT+Sans:400,700';
     	}




     	if ( in_array('on', array($poppins, $quicksand, $raleway, $PTSans)) ) {

     			$query_args = array(
     			'family' => urlencode( implode( '|', $font_families ) ),
     			'subset' => urlencode( 'latin,latin-ext' ),
     		);

     		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
     	}

     	return  $fonts_url;
     }


 //add support for woocommerce
 add_action('after_setup_theme', 'daisy_theme_support');
 function daisy_theme_support(){
   add_theme_support('woocommerce');
   add_theme_support( 'custom-header' );
 }


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
 	 * Sort Category pages on meta tag dd_sort
 	 *
 	 * @hook filter 'pre_get_posts'
 	 * @return void
	 */
function sort_category_on_meta() {
  if(is_category()){

    set_query_var('meta_key','dd_sort');
    set_query_var('orderby', 'meta_value_num');
    set_query_var('order', 'ASC');
  }

}
add_action('pre_get_posts', 'sort_category_on_meta');
