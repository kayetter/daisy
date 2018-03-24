<?php
/**
 * Template used to display post content on single pages.
 *
 * @package storefront
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	do_action( 'storefront_single_post_top' );

			/**
			 * Functions hooked in to storefront_loop_post action.
			 *
			 * @hooked daisy_post_header          - 10
			 * @hooked storefront_post_content    - 20
			 */
			do_action('daisy_cat_post_content');

	/**
	 * Functions hooked in to storefront_single_post_bottom action
	 *
	 * @hooked 'daisy_cat_post_nav'				- 10
	 * @hooked storefront_post_nav         - 10
	 * @hooked storefront_display_comments - 20
	 */
	 $cat=get_the_category();
	 if($cat[0]->slug != 'help'){

			remove_action('storefront_single_post_bottom', 'storefront_post_nav', 10);
			do_action( 'storefront_single_post_bottom');
		}
	?>

</div><!-- #post-## -->
