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
  * Display the site title or logo
  *
  * @since 2.1.0
  * @param bool $echo Echo the string or return it.
  * @return string
  */
 function storefront_site_title_or_logo( $echo = true ) {
   if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
     $logo = get_custom_logo();
     $logo .= '<div class="tagline">'.get_bloginfo("description")."</div>";
     $html = is_home() ? '<h1 class="logo">' . $logo . '</h1>' : '<div class="custom-logo-div">'.$logo.'</div>';
   } elseif ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
     // Copied from jetpack_the_site_logo() function.
     $logo    = site_logo()->logo;
     $logo_id = get_theme_mod( 'custom_logo' ); // Check for WP 4.5 Site Logo
     $logo_id = $logo_id ? $logo_id : $logo['id']; // Use WP Core logo if present, otherwise use Jetpack's.
     $size    = site_logo()->theme_size();
     $html    = sprintf( '<a href="%1$s" class="site-logo-link" rel="home" itemprop="url">%2$s%3$s</a>',
       esc_url( home_url( '/' ) ),
       wp_get_attachment_image(
         $logo_id,
         $size,
         false,
         array(
           'class'     => 'site-logo attachment-' . $size,
           'data-size' => $size,
           'itemprop'  => 'logo'
         )
       ),
       '<h2>'.bloginfo( 'description' ).'</h2>'
     );

     $html = apply_filters( 'jetpack_the_site_logo', $html, $logo, $size );
   } else {
     $tag = is_home() ? 'h1' : 'div';

     $html = '<' . esc_attr( $tag ) . ' class="beta site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a></' . esc_attr( $tag ) .'>';

     if ( '' !== get_bloginfo( 'description' ) ) {
       $html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
     }
   }

   if ( ! $echo ) {
     return $html;
   }

   echo $html;
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

 /**
  * remove default sorting dropdown in StoreFront Theme
  *
  * @since 1.0.0
  */
 add_action('init','remove_storefront_sorting');
 function remove_storefront_sorting() {
   remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
   remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
   }


/**
 * Dequeue storefront fonts to load later and improve performance
 * @see daisy_fonts_url
 * @since 1.0.0
 */
 add_action( 'wp_enqueue_scripts', 'remove_storefront_fonts', 999);
 function remove_storefront_fonts(){

   wp_dequeue_style('storefront-fonts');

 }
