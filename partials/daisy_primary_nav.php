<?php
/**
 * HTML for daisy theme primary navigation menu
 * @hook action
 *
 * @package Daisy theme
 * @since 0.2.0
 */
 ?>

<nav id="dd-primary-nav"class="daisy-menu daisy-hz-menu" >
  <ul class="dd-top-menu">
    <!-- Home -->
       <li class="<?php echo is_front_page()?"dd-menu-selected":"" ?>" > <a href="<?php echo home_url() ?>">Home</a></li>


     <!-- Bizcards -->
       <?php
       //show bizcard menu if user is a subscriber

       if(current_user_can('edit_bizcards')): ?>
       <li class="has-children">My Bizcards<a href="#"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></a>

             <ul class="children">
               <li class="<?php echo is_post_type_archive("bizcard")?"dd-menu-selected":"" ?>"> <a href="<?php echo get_post_type_archive_link( 'bizcard') ?>">All Bizcards</a></li>
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

    <!-- Shop menu itemsproducts -->
      <li class="has-children <?php echo is_page(wc_get_page_id("shop"))?'dd-menu-selected':'' ?>" ><a href="<?php echo get_permalink(wc_get_page_id('shop')) ?>" >Shop</a><a href="#"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></a>
        <ul class="children">
          <li class="<?php echo is_page(wc_get_page_id("shop"))?"dd-menu-selected":"" ?>" ><a href="<?php echo get_permalink(wc_get_page_id("shop")) ?>">Bizcards</a></li> <?php

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
       ?>
        <li class="<?php echo is_user_logged_in()?'has-children ':'' ?>"><a href="<?php echo the_permalink(wc_get_page_id("myaccount")) ?>"><?php echo is_user_logged_in()?'My Account<a href="#"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></a>':'Login' ?> </a>
          <?php if(is_user_logged_in()): ?>
            <ul class="children">
                <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
                  <?php if($endpoint=='customer-logout'): continue; endif; ?>
                  <li class="<?php echo is_wc_endpoint_url($endpoint)?'dd-menu-selected':''; ?>">
                    <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
        </li>

    <?php
      if(current_user_can("edit_others_posts")): ?>
        <li ><a href="<?php echo the_permalink(get_page_by_path("daisy-print-pre")) ?>">Daisy Print Pre</a></li> <?php
      endif;
      ?>

       </ul>
    </nav>
