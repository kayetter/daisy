<?php


//daisy status tag on bizcard
function bizcard_status_tag(){
  $status = get_post_status(get_the_ID());
  switch($status){
    case('publish'):
      $color = '#60b861';
      break;
    case('pending'):
      $color = '#df9e06';
      break;
    default:
      $color = '#808080';
  } ?>
  <div class="bizcard-status" style = "background: <?php echo $color ?>">
  <?php
  if('publish'==get_post_status(get_the_ID())){
    echo 'Active';
  } else {
    echo get_post_status(get_the_ID());
  }
   ?>
  </div>
<?php
}

//include format parameter
//    link = anchor tag with drdcard link to download vcard;
//    file-link = link to file with filename as inner html;
//    file = filename only or
//    raw = raw with line breaks
//   default is filename


function daisy_post_navigation(){
   ?>
   <div class = "post-navigation">
     <?php
     $args = array(
       'next_text' => '%title',
       'prev_text' => '%title',
       );
     the_post_navigation( $args );
     ?>
   </div>
   <?php
 }
