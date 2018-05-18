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

			<header class="page-header">
					<?php if(!is_category("help")): ?>

					<h1><?php echo ucwords(single_term_title("", false)); ?></h1>
				<?php
				endif;
				?>
			</header><!-- .page-header -->

			<?php
			if(is_category("help")):
				$parent_id = get_query_var('cat');
				$args = array(
					'numberposts'=>1,
					'name'=>'get-help'
				);
				query_posts($args);

				while(have_posts()): the_post();
					get_template_part('content', 'category-single');
				endwhile;

			elseif(!is_single()):
				$parent_id = get_query_var('cat');

				if(category_has_children($parent_id)):

				 $categories = get_categories(array('parent'=>$parent_id)); foreach ($categories as $cat) {

						$args = array(
							'cat'=>$cat->term_id,
							'meta_key'=>'dd_sort',
							'orderby'=>'meta_value_num',
							'order'=>'ASC'
						);
						query_posts($args);

						get_template_part( 'loop', 'category' );
					} //end foreach
				else: // else if does not have children

					get_template_part( 'loop', 'category' );
				endif;

			 elseif(is_single()):
				$category = get_the_category();
				$parent_id = $category[0]->term_id;
				get_template_part('content', 'category-single');

			else:

				get_template_part( 'content', 'none' );

			endif;
				?>
				<pre>
					<?php
							global $wp_query;
							print_r($wp_query->query_vars);
					 ?>
				</pre>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
/**
 * 'daisy_cat_sidebar' hooked functions
 *
 * 'daisy_cat_sidebar_before', 10
 * 'daisy_cat_post_submenu', 20
 * 'daisy_category_menu_widget', 30
 * 'daisy_cat_sidebar_after', 40
 */
do_action( 'daisy_cat_sidebar', $parent_id );
get_footer();
