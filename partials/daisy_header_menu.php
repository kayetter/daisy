<?php
/**
 * Custom Header menu HTML for Daisy LOGIN | ACCOUNT | CART
 *
 * @package daisy
 */

?>

  <nav class="flex-div" id="daisy-header-menu">

   <ul  class="">
     <?php if(is_user_logged_in()): ?>

   		<li class="dd-menu-item" id="dd-user">
         <a aria-haspopup="true" title="My Account" href="<?php the_permalink(wc_get_page_id('myaccount'))   ?>"><i class="fa fa-user fa-lg dd-menu-item-icon" aria-hidden="true" title="<?php echo esc_html(ucwords($current_user->user_firstname)) ?>"></i> <span class="dd-menu-item-title"><?php echo esc_html( ucwords($current_user->user_nicename) ) ?></span>
         </a>
       </li>
    <?php endif; ?>
   		<li class="dd-menu-item" id="dd-login">
        <?php
        if (is_user_logged_in()):
          ?>
            <a title="Logout" href="<?php echo wp_logout_url( get_permalink( wc_get_page_id( 'shop' ) ) ) ?>"><i class="fa fa-sign-in fa-lg dd-menu-item-icon" aria-hidden="true"></i><span class="dd-menu-item-title">Logout</span></a>
            <?php
        elseif(!is_user_logged_in()):
        ?>
            <a title="Login" href="<?php the_permalink( wc_get_page_id( 'myaccount' ) ) ?> "><i class="fa fa-sign-in fa-lg dd-menu-item-icon" aria-hidden="true"></i><span class="dd-menu-item-title">Login</span></a>

        <?php endif; ?>

        </li> <!-- end of dd-menu-item dd-login -->
        <li>
          <a href="<?php echo $help_link ?>" title="Help"><i class="fa fa-question-circle fa-lg dd-menu-item-icon" aria-hidden="true"></i><span class="dd-menu-item-title">Help</span></a>
        </li>
        <li class="dd-menu-item" id="dd-cart">
            <a title="Cart" id="dd-cart-icon" href="<?php the_permalink( wc_get_page_id( 'cart' ) ) ?> "><i class="fa fa-shopping-basket fa-lg " aria-hidden="true"></i>
            <?php if($item_count > 0): ?>
               <span class="dd-indicator"><?php echo $item_count ?></span>
           <?php endif; ?>
            </a>
         </li>
         <li class="dd-menu-item" id="dd-search-menu-item">
           <?php require_once(get_stylesheet_directory()."/partials/header-search.php") ?>
         </li>
         <li class="dd-menu-item" id="dd-hamburger">
           <a href=""><i class="fa fa-bars fa-lg" aria-hidden="true"></i></a>
         </li>
     </ul>
   </nav>
