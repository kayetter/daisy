<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */
if(isset($_POST['update'])){
  Daisy_Bizcard::daisy_update_bizcard();
}


get_header('bizcards'); ?>


	<div id="primary" class="content-area" >
		<main id="main" class="site-main" role="main">

		<?php


    while ( have_posts() ) : the_post();

		get_template_part( 'content', 'bizcard' );
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

      echo "----------------seession-----------------<br>";
			print_r($_SESSION);
      echo $_SESSION['vcard_post_id'] == $_SESSION['vcard-set-raw']? "true":"false";
      unset($_SESSION);

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
