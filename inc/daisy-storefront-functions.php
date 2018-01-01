<?php
/**
 * Storefront template functions modified by Daisy.
 *
 * @package storefront
 */



 /**
  * Site branding wrapper and display
  *
  * @since  1.0.0
  * @return void
  */
 function storefront_site_branding() {
   ?>
   <div class="site-branding flex-div" id="daisy-site-branding">
     <?php storefront_site_title_or_logo();
           echo daisy_header_menu();
     ?>
   </div>
   <?php
 }

 /**
  	 *remove storefont inline head sytles
  	 *
  	 * @return void
 	 */

 function daisy_remove_storefront_standard_functionality() {

   set_theme_mod('storefront_styles', '');
   set_theme_mod('storefront_woocommerce_styles', '');

 }
 add_action( 'init', 'daisy_remove_storefront_standard_functionality' );
