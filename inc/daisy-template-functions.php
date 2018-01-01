<?php
/**
 * Custom ations added to daisy theme
 *
 * @package daisy
 */


/**
 	 * Block comment
 	 *
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
