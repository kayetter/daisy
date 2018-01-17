<?php
/**
 * HTML for daisy theme primary navigation menu
 * @hook action daisy_primary_nav
 *
 * @package Daisy theme
 * @since 0.2.0
 */
 ?>

<nav id="dd-primary-nav"class="daisy-menu daisy-hz-menu" >
  <ul class="dd-top-menu">
       <li class="<?php echo is_front_page()?"dd-menu-selected":"" ?>" > <a href="<?php home_url() ?>">Home</a></li> <?php
       //show bizcard menu if user is a subscriber
       if(current_user_can('edit_bizcards')): ?>
       <li class="has-children">Bizcards<a href="#"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></a>

             <ul class="children">
               <li class="<?php echo is_post_type_archive("bizcards")?"dd-menu-selected":"" ?>"> <a href="<?php echo get_post_type_archive_link( 'bizcards') ?>">My Bizcards</a></li>
               <?php
             foreach($bizcard_sub as $submenu_slug=>$subdefs):
               if($id = get_page_by_path($submenu_slug)):
                 ?>
                 <li class"<?php echo is_page("$submenu_slug")?"dd-menu-selected":"" ?>"> <a href="<?php the_permalink($id) ?>"><?php  echo isset($subdefs["title"])?$subdefs["title"]:get_the_title($id);  ?></a></li>

             <?php
               endif;
             endforeach; ?>
             </li>
             </ul>

  <?php
  //endif for current_user_can
endif; ?>
<!-- adding menu item for products -->
  <li class="has-children" >Products<a href="#"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></a>
    <ul class="children">
      <li class="<?php echo is_page(wc_get_page_id("shop"))?"dd-menu-selected":"" ?>" ><a href="<?php echo get_permalink(wc_get_page_id("shop")) ?>">All Products</a></li> <?php

      foreach($product_sub as $submenu_slug=>$subdefs):
        if($id = get_page_by_path($submenu_slug)):
          ?>
          <li class"<?php echo is_page("$submenu_slug")?"dd-menu-selected":"" ?>"> <a href="<?php the_permalink($id) ?>"><?php  echo isset($subdefs["title"])?$subdefs["title"]:get_the_title($id);  ?></a></li>

      <?php
        endif;
      endforeach; ?>

    </ul>

  </li> <?php

  do_action('daisy_cat',"",2,0);
  //if user is not logged in then add yet another login link
  if(!is_user_logged_in()): ?>
    <li ><a href="<?php echo the_permalink(wc_get_page_id("myaccount")) ?>">Login</a></li> <?php
  endif;


  if(current_user_can("delete_plugins")): ?>
    <li ><a href="<?php echo the_permalink(get_page_by_path("daisy-print-pre")) ?>">Daisy Print Pre</a></li> <?php
  endif;
  ?>

   </ul>
</nav>
