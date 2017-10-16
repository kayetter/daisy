<?php
/**
 * A template used to display Dopey Daisy Bizcard forms
 *
 * Template Name: New Bizcard
 *
 */




 get_header('bizcards'); ?>


 	<div id="primary" class="content-area" >
 		<main id="main" class="site-main" role="main">

   		<?php
        //if user is logged in then get content
      if(is_user_logged_in()):

         while ( have_posts() ) : the_post();
            the_title("<h1>","</h1>");


            get_template_part( 'content', 'bizcards' );


     		?>

     		<?php

     		endwhile; // End of the loop.


        else:  ?> <!-- endif for is_user_logged_in conditional -->

          <h4>You must be logged in to view the content of this page.
            <a href="<?php echo home_url("/login") ?> ">Go to Login</a>
          </h4>

      <?php

      endif;   ?>
 		</main><!-- #main -->

 	</div><!-- #primary -->


 <?php
 do_action( 'storefront_sidebar' );
 get_footer();
