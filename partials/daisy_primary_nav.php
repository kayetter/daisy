<?php
/**
 * The primary navigation menu for theme daisy.
 *
 * Displays content navigation menu
 *
 * @package daisy
 */
 $pages = array(
   'shop' => array(),
    'daisy-help' => array()
   );

 $bizcard_sub = array(
       'new-bizcard'=>array(
    "title"=> "New Bizcard"),
     'manage-vcards'=>array(),
     'new-vcard' => array(
       "title"=> "New VCard"),
   );


?>
<ul>
     <li> <a href="<?php home_url() ?>">Home</a></li>
     <li> <a href="<?php echo get_post_type_archive_link( 'bizcards') ?>">My Bizcards</a></li>

           <ul> <?php
           foreach($bizcard_sub as $submenu_slug=>$subdefs):
             if($id = get_page_by_path($submenu_slug)):
               ?>
               <li> <a href="<?php the_permalink($id) ?>"><?php  echo isset($subdefs["title"])?$subdefs["title"]:get_the_title($id);  ?></a></li>

           <?php
             endif;
           endforeach; ?>
           </ul>

<?php 
 foreach($pages as $slug=>$defs):

   if($page = get_page_by_path($slug)):
      $id = $page->ID;
     ?>
     <li> <a href="<?php echo the_permalink($id) ?>"><?php  echo isset($defs["title"])?$defs["title"]:get_the_title($id);  ?></a></li>
      <?php

   endif;
endforeach; ?>

 </ul>
 <pre>

   <?php
print_r($pages);
    ?>
 </pre>
