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

//include format parameter link or file
function daisy_vcard_display($format='link'){
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
          $content = '<a href="'.$child->guid.'" title="download daisy vCard" open>'.basename($child->guid).'</a>';
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
