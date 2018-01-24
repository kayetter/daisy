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

/*Reduce the strength requirement on the woocommerce password.
*
* Strength Settings
* 3 = Strong (default)
* 2 = Medium
* 1 = Weak
* 0 = Very Weak / Anything
*/
function reduce_woocommerce_min_strength_requirement( $strength ) {
   return 2;
}
add_filter( 'woocommerce_min_password_strength', 'reduce_woocommerce_min_strength_requirement' );
