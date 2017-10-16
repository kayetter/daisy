<?php
/**
 * The template for displaying all single bizcard posts.
 *
 * @package storefront
 */

get_header('bizcards'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<h3>
				<a href="<?php echo home_url("bizcards") ?>">View All Bizcards</a>.
			</h3>

		<?php while ( have_posts() ) : the_post();

			do_action( 'storefront_single_post_before' );

			get_template_part( 'content', 'bizcards' );

			do_action( 'storefront_single_post_after' );

		endwhile; // End of the loop.


		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
