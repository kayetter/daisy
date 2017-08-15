<?php
/**
 * Modified main template file for daisy theme (a child theme of storefront)
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) :

			get_template_part( 'loop' );

		else :

			get_template_part( 'content', 'none' );

		endif; ?>

    <?php
    echo (__ABSPATH__)."<br>";
      echo get_template_directory()."<br>";
      echo (__DIR__)."<br>";
      echo (__FILE__)."<br>";
      echo plugin_dir_path(__FILE__)."<br>";
      echo (__ABSPATH__)."<br>";
      echo get_admin_url()."<br>";
      echo site_url()."<br>";
      echo home_url()."<br>";
      echo get_stylesheet_directory_uri();
			echo "<br>---------------------------------------------------<br>";?>
			<pre>
				<?php
				print_r($_SESSION);
				$_SESSION['errors'] = null;

				 ?>
			</pre>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
