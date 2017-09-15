<?php
/**
 * Template Name: New Bizcard
 *
 *
 */

 if(is_page('daisy-error-log') && get_query_var('dd_clear')=="true"){
   $contents = "";
   file_put_contents(DAISY_PLUGIN_DIR."daisy_error_log.txt", $contents);
   wp_redirect(remove_query_arg('dd_clear'));
   exit;
 }

 get_header('bizcards'); ?>


 	<div id="primary" class="content-area" >
 		<main id="main" class="site-main" role="main">

 		<?php


     while ( have_posts() ) : the_post();
    if(is_page('new-bizcard')){
      the_title('<h1>','</h1>');
      get_template_part( 'content', 'submit_form' );
    }  else {
      get_template_part( 'content', '' );
    }
 		?>

 		<?php
 		endwhile; // End of the loop. ?>


 		</main><!-- #main -->
 	</div><!-- #primary -->


 <?php
 do_action( 'storefront_sidebar' );
 get_footer();
