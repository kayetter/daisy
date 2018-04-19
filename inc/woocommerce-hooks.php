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

/*
* Add link to new bizcard to thankyou your order has been received
* Strength Settings
* @hook filter 'woocommerce_thankyou_order_received_text'
*/
function add_line_to_order_thankyou($text, $order){
  if( !$order->has_status( 'failed' ) ){

     $text .= '<p>Create a <a href="'.get_permalink(get_page_by_path('new-bizcard')).'" >New Bizcard</a> to get started.</p>';
    }
 return $text;
}
add_filter('woocommerce_thankyou_order_received_text', 'add_line_to_order_thankyou', 10, 2);

/*
* remove action from 'woocommerce_single_product_summary' action that displays category meta
*
*/
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta', 40);



/*
 * Add customer email to Cancelled Order recipient list
 */
 function wc_cancelled_order_add_customer_email( $recipient, $order ){
   if(!$order){
     return $recipient;
   }
     $recipient .= ',' . $order->get_billing_email();
     return $recipient;
 }
add_filter( 'woocommerce_email_recipient_cancelled_subscription', 'wc_cancelled_order_add_customer_email', 10, 2 );
