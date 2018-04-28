<?php
/**
 * Custom functions added to daisy theme
 *
 * @package daisy
 */


/**
 	 * HTML for header menu
 	 * @see header-bizcards.php
 	 * @param type
 	 * @return void
	 */
	function daisy_header_menu(){
    global $current_user;
    if(WC()->cart->get_cart_contents_count()){

      $item_count = WC()->cart->get_cart_contents_count();
    } else {

      $item_count = 0;
    }

		$help_link = home_url();
		if(term_exists("help")){
			$help_link = get_permalink(daisy_get_post_id_by_slug("get-help"));
		}

    ob_start();
    require_once(get_stylesheet_directory()."/partials/daisy_header_menu.php");
    return ob_get_clean();

  }

/**
 	 * Is a post in category Help
 	 *
 	 * @param $post_id
 	 * @return boolean
	 */
function is_post_help($post_id){
		$terms = get_the_terms($post_id, 'category');
		if(!$terms){
			return false;
		}
		if(is_wp_error($terms)){
			wp_die("there was an error retrieving your term");
		}
		if($terms[0]->slug == "help"){
			return true;
		}
		$continue = true;
		$i=0;
		while ($continue==true && $i < count($terms)){
			$ancestors = get_ancestors( $terms[$i]->term_id, 'category');
			if(empty($ancestors)){

				$i++;
				continue;
			}
			$rootId = end( $ancestors);
			$root = get_term( $rootId, 'category' );
			$i++;
			if($root->name=="Help"){
				$continue = false;
				return true;
			}
		}
			return false;
	}

	/**
	 * Returns the permalink for a page based on the incoming slug.
	 *
	 * @param   string  $slug   The slug of the page to which we're going to link.
	 * @return  string          The permalink of the page
	 * @since   1.0.3
	 */
	function daisy_get_post_id_by_slug( $slug, $post_type = '' ) {

	    // Initialize the permalink value
	    $post_id = null;

	    // Build the arguments for WP_Query
	    $args = array(
	        'name'          => $slug,
	        'max_num_posts' => 1
	    );

	    // If the optional argument is set, add it to the arguments array
	    if( '' != $post_type ) {
	        $args = array_merge( $args, array( 'post_type' => $post_type ) );
	    }

	    // Run the query (and reset it)
	    $query = new WP_Query( $args );
	    if( $query->have_posts() ) {
	        $query->the_post();
	        $post_id = get_the_ID();
	        wp_reset_postdata();
	    }
	    return $post_id;
	}

	/**
 * Check if given term has child terms
 *
 * @param Integer $term_id
 * @param String $taxonomy
 *
 * @return Boolean
 */
function category_has_children( $term_id = 0, $taxonomy = 'category' ) {
    $children = get_categories( array(
        'child_of'      => $term_id,
        'taxonomy'      => $taxonomy,
        'hide_empty'    => false,
        'fields'        => 'ids',
    ) );
    return ( $children );
}
