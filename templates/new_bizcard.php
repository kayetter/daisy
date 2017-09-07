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

 		<pre>
 			<?php
 			global $current_user;

 			if(isset($_POST['post_id'])){
 				print_r(get_post($_POST['post_id']));
 			}
       echo "----------------POST-----------------<br>";
       print_r($_POST);

       echo "----------------FILES-----------------<br>";
 			print_r($_FILES);

       echo "----------------errors-----------------<br>";
     	print_r($errors);

       echo "----------------session-----------------<br>";
 			print_r($_SESSION);
 			unset($_SESSION['complete']);
 			unset($_SESSION['vcard-set-raw']);
 			unset($_SESSION['vcard_post_is_set']);
 			unset($_SESSION['child']);
 			unset($_SESSION['org-vcard']);
 			unset($_SESSION['message']);

 			echo "post_meta".get_post_meta(33, '_wp_attached_file', true);

       echo "<br>";
       print_r(get_allowed_mime_types());
       echo "<br>";

 			 ?>
 		</pre>

 		</main><!-- #main -->
 	</div><!-- #primary -->


 <?php
 do_action( 'storefront_sidebar' );
 get_footer();
