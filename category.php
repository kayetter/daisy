<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main daisy-cat-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1><?php echo ucwords(single_term_title("", false)); ?></h1>

			</header><!-- .page-header -->

			<?php get_template_part( 'loop', 'category' );

		else :

			get_template_part( 'content', 'none' );

		endif; ?>
		<?php
		global $wp_query;
		$cat_id = $wp_query->get_queried_object_id();
		$args = array(
			 'child_of'            => $cat_id,
			 'current_category'    => $cat_id,
			 'depth'               => 0,
			 'echo'                => 1,
			 'exclude'             => '',
			 'exclude_tree'        => '',
			 'feed'                => '',
			 'feed_image'          => '',
			 'feed_type'           => '',
			 'hide_empty'          => false,
			 'hide_title_if_empty' => false,
			 'hierarchical'        => true,
			 'order'               => 'ASC',
			 'orderby'             => 'name',
			 'separator'           => '<br />',
			 'show_count'          => 0,
			 'show_option_all'     => 'All Help topics',
			 'show_option_none'    => "",
			 'style'               => 'list',
			 'taxonomy'            => 'category',
			 'title_li'            => ucwords(single_term_title( "", false )),
			 'use_desc_for_title'  => 0,
		 );
	wp_list_categories($args);
?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'daisy_cat_sidebar' );
get_footer();
