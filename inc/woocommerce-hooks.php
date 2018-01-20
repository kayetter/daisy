<?php
/**
 * Modifications to woocommerce hooks and filters
 *
 * @package Daisy theme
 * @since 1.0.1
 */


 /**
  * Removes additional information and order notes from checkout
  *
  * @since 1.0.1
  */
add_filter( 'woocommerce_checkout_fields' , 'alter_woocommerce_checkout_fields' );
function alter_woocommerce_checkout_fields( $fields ) {
     unset($fields['order']['order_comments']);
     return $fields;
}
