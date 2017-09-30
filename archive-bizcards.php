<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package storefront
 */

get_header('bizcards');
if(is_user_logged_in()): ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php

		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					//the_archive_title( '<h1 class="page-title">', '</h1>' );
					//the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header>

			<?php
			get_template_part( 'loop', 'bizcards' );
			?>
			<h3>
				<a href="<?php echo home_url("new-bizcard") ?>">+ </a> Add another <a href="<?php echo home_url("new-bizcard") ?>">Bizcard</a>.
			</h3>
			<?php
		else :

			?>
			<h3>
				Click <a href="<?php echo home_url("new-bizcard") ?>">here</a> to get started.
			</h3>


			<?php

		endif;


		?>

		</main><!-- #main -->
	</div><!-- #primary -->



<?php
do_action( 'storefront_sidebar' );
endif;
get_footer();
