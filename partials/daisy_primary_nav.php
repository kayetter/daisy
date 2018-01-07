<?php
/**
 * HTML for daisy theme primary navigation menu
 * @hook action daisy_primary_nav
 *
 * @package Daisy theme
 * @since 0.2.0
 */
 ?>

<nav id="dd-primary-nav">
  <ul class="dd-top-menu">
       <li class="<?php echo is_front_page()?"dd-menu-selected":"" ?>" > <a href="<?php home_url() ?>">Home</a></li> <?php
       if(current_user_can('edit_bizcards')): ?>
       <li class="dd-has-submenu">Bizcards<a href="#"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></a>

             <ul class="dd-submenu">
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
endif;
   foreach($pages as $slug=>$defs):

     if($page = get_page_by_path($slug)):
        $id = $page->ID;
       ?>
       <li class="<?php echo isset($defs["sub-menu"])?"dd-has-submenu":""; echo  is_page("$slug")?"dd-menu-selected":"" ?> ">

         <!-- if li does not have submenu than make it a link -->
       <?php if(!isset($defs["sub-menu"])): ?>
         <a href="<?php echo the_permalink($id) ?>"><?php
       endif;
          echo isset($defs["title"])?$defs["title"]:get_the_title($id);

          //if li doesnot have submenu then close anchor tag
        if(!isset($defs["sub-menu"])):  ?>
            </a> <?php

            //if is sub menu then add caret and sub menu items
        else: ?>

        <a href="#"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></a>
          <ul class="dd-submenu"> <?php
          foreach($defs["sub-menu"] as $submenu => $subdefs):
            if($submenu = get_page_by_path($submenu)):
                $subid = $submenu->ID; ?>
                 <li class="<?php echo is_page($submenu)?"dd-menu-selected":"" ?>"> <a href="<?php echo the_permalink($subid) ?>"><?php  echo isset($subdefs["title"])?$subdefs["title"]:get_the_title($subid);  ?></a></li>

          <?php
            endif;
          endforeach; ?>
          </li>
          </ul> <?php
        endif;

     endif;
  endforeach;
  if(current_user_can("delete_plugins")): ?>
    <li ><a href="<?php echo the_permalink(get_page_by_path("daisy-print-pre")) ?>">Daisy Print Pre</a></li> <?php
  endif;
  ?>

   </ul>
</nav>
