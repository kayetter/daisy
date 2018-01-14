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
		if($terms[0]->name == "Help"){
			return true; 
		}
		$continue = true;
		$i=0;
		while ($continue==true && $i<count($terms)-1){
			$ancestors = get_ancestors( $terms[$i]->term_id, 'category');
			$rootId = end( $ancestors);
			$root = get_term( $rootId, 'category' );
			$i++;
			if($root->name=="Help"){
				$continue = false;
				return true;
			}
			return false;
		}
	}
