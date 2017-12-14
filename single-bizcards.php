<?php

/**
 * The template for displaying all single bizcard posts.
 *
 * @package storefront
 */

get_header('bizcards'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php

//content if user is admin or post owner
		if(is_user_logged_in() && (get_post_field( 'post_author', $post_id ) ==  get_current_user_id()||current_user_can("delete_plugins"))):

 			?>
			<div class="bizcard-main-links">
				<h3>
					<a href="<?php echo home_url("bizcards") ?>">View All Bizcards</a>.
				</h3>
				<h3>
					<a href="<?php echo home_url("new-bizcard") ?>">+ </a> Add another <a href="<?php echo home_url("new-bizcard") ?>">Bizcard</a>.
				</h3>
			</div>

		<?php

		while ( have_posts() ) : the_post();

			do_action( 'storefront_single_post_before' );

			get_template_part( 'content', 'bizcards' );

			do_action('daisy_post_navigation');

			do_action( 'storefront_single_post_after' );

			endwhile; // End of the loop.

	else: //end of user is admin or post owner loop

		//content if you are not admin nor post owner

		while ( have_posts() ) : the_post();

			do_action( 'storefront_single_post_before' );

			get_template_part( 'content', 'bizcards' );

			do_action( 'storefront_single_post_after' );

			endwhile; // End of the loop.




		endif; //end of public link with proper $_GET credentials

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
