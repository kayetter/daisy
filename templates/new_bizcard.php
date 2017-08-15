<?php
 /**
  * Template Name: New Bizcard
  *
  *
  */

 //retrieving session instance

$session=Daisy_Session::init();
 $session->check_errors();
 $session->check_message();



 if(is_page('daisy-log-file') && get_query_var('dd_clear')=="true"){
   $contents = "";
   file_put_contents(DAISY_PLUGIN_DIR."daisy_error_log.txt", $contents);
   wp_redirect(remove_query_arg('dd_clear'));
   exit;
 }


 get_header('bizcards'); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post();

  		the_content();

			endwhile; // End of the loop. ?>
      <pre>

        <?php
        print_r($_SESSION);
        echo plugins_url()."<br>";
        echo get_permalink();
        echo plugin_dir_url('daisy')."<br>";
        print_r($_POST);
        echo "-----------------------<br>";
        print_r($session->errors);
        global $wp_query;
        print_r($wp_query->query_vars);
        echo "dd_clear = ".$dd_clear;




         ?>
      </pre>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

do_action( 'storefront_sidebar' );
get_footer();
