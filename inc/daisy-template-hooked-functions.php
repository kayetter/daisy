<?php
/**
 * Actions and filters for daisy theme
 *
 *
 * @package Daisy theme
 * @since 0.2.0
 */

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

/**
 * The primary navigation menu for theme daisy.
 *
 * Displays content navigation menu
 * @hook action daisy_primary_nav
 * @see header-bizcards.php
 * @package daisy
 */
function daisy_primary_nav(){
	 $product_sub = array(
	          "bizcards-templates" => array(
	          "title" => "Templates"
	        ),
	        "bizcards-custom" => array(
	          "title" => "Custom Bizcards"
	        )
	      );



	 $bizcard_sub = array(
	       'new-bizcard'=>array(
	    "title"=> "New Bizcard"),
	     'manage-vcards'=>array(),
	     'new-vcard' => array(
	       "title"=> "New VCard"),
	   );
		 require_once(get_stylesheet_directory()."/partials/daisy_primary_nav.php");
}
//create daisy_primary_nav action which includes storefront nav wrapper and site branding
add_action('daisy_primary_nav', 'storefront_site_branding',10);
add_action('daisy_primary_nav', 'storefront_primary_navigation_wrapper',20);
add_action('daisy_primary_nav', 'daisy_primary_nav', 30);
add_action('daisy_primary_nav', 'storefront_primary_navigation_wrapper_close', 40);

/**
 * The title section for daisy content-daisy-page
 *
 * Displays content navigation menu
 * @hook action daisy_title_header
 * @see content-daisy.php
 * @package daisy
 */
function daisy_title_header(){ ?>

	<header class="page-header flex-div"> <?php
		the_title( '<h1 class="page-title">', '</h1>' );

		if(is_page('manage-vcards')): ?>

			<h1><a title="Add a new VCard" href="<?php echo get_permalink(get_page_by_path("new-vcard")) ?>"><i class="fa fa-plus" aria-hidden="true"></i></a></h1>
		<?php	endif; ?>
	</header> <?php
}
add_action('daisy_title_header', 'daisy_title_header', 10);

function add_daisy_share_buttons(){
	require_once(get_stylesheet_directory()."/partials/share_buttons.php");
}
add_action('daisy_footer', 'add_daisy_share_buttons', 10);
