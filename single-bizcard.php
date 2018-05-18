<?php

/**
 * The template for displaying all single bizcard posts.
 *
 * @package storefront
 */

get_header('bizcard'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		global $post;
		$post_id = $post->ID;
		//content if user is admin or post owner
		if(get_post_field( 'post_author', $post_id ) ==  get_current_user_id() || current_user_can("delete_plugins")):
 			?>
			<div class="bizcard-main-links">
				<h3>
					<a href="<?php echo home_url("bizcard") ?>">View All Bizcards</a>.
				</h3>
				<h3>
					<a href="<?php echo home_url("new-bizcard") ?>">Add another Bizcard</a>.
				</h3>
			</div>

			<?php
		endif; //end post_author conditional

	if(have_posts()):

		while ( have_posts() ) : the_post();

			do_action( 'storefront_single_post_before' );

			get_template_part( 'content', 'bizcard' );

			if(get_post_field( 'post_author', $post_id ) ==  get_current_user_id() || current_user_can("delete_plugins")):

				do_action('daisy_post_navigation');

			endif; //end author navigation

			do_action( 'storefront_single_post_after' );

			endwhile; // End of the loop.

	else:

		//content none if there are no posts

			do_action( 'storefront_single_post_before' );

			get_template_part( 'content', 'none' );

			do_action( 'storefront_single_post_after' );



	endif; //endif have_posts() conditional

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
