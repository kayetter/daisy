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




 /**
  * Display the post meta
  *
  * @since 1.0.0
  */
 function daisy_post_meta() {
   ?>
   <aside class="entry-meta">
     <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search.


     /* translators: used between list items, there is a space after the comma */
     $categories_list = get_the_category_list( __( ', ', 'storefront' ) );

     if ( $categories_list ) : ?>
       <div class="cat-links">
         <?php
         echo '<div class="label">' . esc_attr( __( 'Posted in', 'storefront' ) ) . '</div>';
         echo wp_kses_post( $categories_list );
         ?>
       </div>
     <?php endif; // End if categories. ?>

     <?php
     /* translators: used between list items, there is a space after the comma */
     $tags_list = get_the_tag_list( '', __( ', ', 'storefront' ) );

     if ( $tags_list ) : ?>
       <div class="tags-links">
         <?php
         echo '<div class="label">' . esc_attr( __( 'Tagged', 'storefront' ) ) . '</div>';
         echo wp_kses_post( $tags_list );
         ?>
       </div>
     <?php endif; // End if $tags_list. ?>

   <?php endif; // End if 'post' == get_post_type(). ?>

     <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
       <div class="comments-link">
         <?php echo '<div class="label">' . esc_attr( __( 'Comments', 'storefront' ) ) . '</div>'; ?>
         <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'storefront' ), __( '1 Comment', 'storefront' ), __( '% Comments', 'storefront' ) ); ?></span>
       </div>
     <?php endif; ?>
   </aside>
   <?php
 }
