<?php
/**
 * A template used to display test code
 *
 * Template Name: Daisy Print Pre
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
        //if user is logged in then get content
      if(is_user_logged_in() && current_user_can("delete_plugins")):
        if(is_page('daisy-print-pre')):
          do_shortcode('[daisy_print_pre]');
        elseif(is_page("daisy-error-log")):
          do_shortcode('[log_file]');
        endif;

      endif;
      ?>

 		</main><!-- #main -->

 	</div><!-- #primary -->


 <?php
 do_action( 'storefront_sidebar' );
 get_footer();
