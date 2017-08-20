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
function daisy_vcard_display($format='file'){
    global $post;
    $org_vcard = get_post_meta($post->ID,'dd_org-vcard',true);

    if($org_vcard){
      $vcard = basename($org_vcard, ".vcf");
    }
    //make sure there are children
    if ($children = get_children($post->ID)) {

      foreach($children as $child){
        if($child->post_title!=$vcard){
          return; }


        switch($format){
          case('link'):
          $content =
          '<div class="vcard bizcard-edit">
          <a href="'.$child->guid.'" title="download daisy vCard">'.
          esc_url("https://drd.cards/".get_the_title($post->ID)."?".get_post_meta($post->ID, 'dd_pin', true)).'</a></div>';
          break;

          case('file-link');
          $content = $child->guid;
          break;

          case('raw'):
          //return file contents with line breaks preserved
          $content = trim(file_get_contents($child->guid));
          break;

          case('file'):
          $content = basename($child->guid);
          break;

          default:
          $content = "";

        }

        echo $content;

      }
    }
}


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
