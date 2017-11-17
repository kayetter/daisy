<?php
/**
 * A template used to display a users active vcards for read/edit
 *
 * Template Name: Vcard Archive
 *
 */


 get_header('bizcards'); ?>


 	<div id="primary" class="content-area" >
 		<main id="main" class="site-main" role="main">
      <?php

      if(is_user_logged_in()):
        global $current_user;
        ?>
          <h1>Manage VCards</h1>
          <div id="vcard-archive-div">
        <?php
            echo do_shortcode("[daisy_vcard_archive]");
        ?>

          </div> <!--end .#vcard-archive-div -->


          <?php
      else:  ?>

    				<h4>You must be logged in to view the content of this page.
    					<a href="<?php echo home_url("/login") ?> ">Go to Login</a>
    				</h4>

    		<?php

      endif; //endif for is_user_logged_in conditional -->
      ?>

 		</main><!-- #main -->

 	</div><!-- #primary -->


 <?php
 do_action( 'storefront_sidebar' );
 get_footer();
