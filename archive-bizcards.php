<?php
/**
 * The template for displaying archive bizcard pagespages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package DD
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


		<?php

	if(is_user_logged_in()&& current_user_can('edit_bizcards')):
		if ( have_posts() ) : ?>

			<header class="page-header flex-div">
				<h1 class="page-title">My Bizcards</h1><h1><a title="Add a new Bizcard" href="<?php echo get_permalink(get_page_by_path("new-bizcard")) ?>"><i class="fa fa-plus" aria-hidden="true"></i></a> </h1>
			</header><!-- .page-header -->

			<?php get_template_part( 'loop', 'bizcards' ); ?>
			<h3>


				<a href="<?php echo home_url("new-bizcard") ?>"><i class="fa fa-plus" aria-hidden="true"></i></a> Add another <a href="<?php echo home_url("new-bizcard") ?>">Bizcard</a>.
			</h3>

		<?php

		else :

		?>

			<h3>
				Click <a href="<?php echo home_url("new-bizcard") ?>">here</a> to get started.
			</h3>


		<?php

		endif;



	else:  ?> <!-- endif for is_user_logged_in conditional -->

		<h4>You must <a href="<?php echo home_url("my-account") ?>">Login</a> or be an active Subscriber to view the content of this page. <a href="<?php get_permalink(wc_get_page_id("shop")) ?> ">Subscribe</a> </h4>

	<?php

	endif;   ?>


	</main><!-- #main -->
</div><!-- #primary -->



<?php
do_action( 'storefront_sidebar' );

get_footer();
