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
		if((isset($_GET[get_post_meta($post->ID,"dd_pin",true)]) && get_post_status() == "publish") || (get_post_field( 'post_author', $post_id ) ==  get_current_user_id()) || current_user_can("delete_plugins")):

			if(get_post_field( 'post_author', $post_id ) ==  get_current_user_id() || current_user_can("delete_plugins")):
 			?>
			<div class="bizcard-main-links">
				<h3>
					<a href="<?php echo home_url("bizcards") ?>">View All Bizcards</a>.
				</h3>
				<h3>
					<a href="<?php echo home_url("new-bizcard") ?>">Add another Bizcard</a>.
				</h3>
			</div>

			<?php
			endif;

		while ( have_posts() ) : the_post();

			do_action( 'storefront_single_post_before' );

			get_template_part( 'content', 'bizcards' );

			if(get_post_field( 'post_author', $post_id ) ==  get_current_user_id() || current_user_can("delete_plugins")):

				do_action('daisy_post_navigation');

			endif;

			do_action( 'storefront_single_post_after' );

			endwhile; // End of the loop.

	else:

		//content none if you are not owner or admin and don't have dd_pin



			do_action( 'storefront_single_post_before' );

			get_template_part( 'content', 'none' );

			do_action( 'storefront_single_post_after' );



	endif; //end of public link with proper $_GET credentials

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
