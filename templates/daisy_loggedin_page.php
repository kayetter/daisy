<?php
/**
 * A template used to display a users active vcards for read/edit
 *
 * Template Name: Daisy LoggedIn Page
 *
 */


 get_header('bizcards'); ?>


 	<div id="primary" class="content-area" >
 		<main id="main" class="site-main" role="main">
      <?php

      if(is_user_logged_in()):
        global $current_user;
        ?>

          <?php while ( have_posts() ) : the_post();

            do_action( 'storefront_page_before' );

            get_template_part( 'content', 'page' );

            /**
             * Functions hooked in to storefront_page_after action
             *
             * @hooked storefront_display_comments - 10
             */
            do_action( 'storefront_page_after' );

          endwhile; // End of the loop. ?>

          <?php


      else:  ?> <!-- endif for is_user_logged_in conditional -->

  			<h4>You must be <a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ) ?>"><strong>Logged In</strong></a> to view the content of this page.</h4>

  		<?php

  		endif;   ?>


 		</main><!-- #main -->

 	</div><!-- #primary -->


 <?php
 do_action( 'storefront_sidebar' );
 get_footer();
