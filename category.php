<?php
/**
 * The template for displaying archive pages.
 *
 * Template Name: Category
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main daisy-cat-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php if(!is_category("help")): ?>
				<h1><?php echo ucwords(single_term_title("", false)); ?></h1>
			<?php endif; ?>
			</header><!-- .page-header -->

			<?php if(is_single()){
				the_post();
				get_template_part('content', 'category');


			} else {
			 get_template_part( 'loop', 'category' );
		 }
		else :

			get_template_part( 'content', 'none' );

		endif; ?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'daisy_cat_sidebar' );
get_footer();
