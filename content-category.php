<?php
/**
 * Template used to display post content.
 *
 * @package storefront
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Functions hooked in to storefront_loop_post action.
	 *
	 * @hooked daisy_post_header          - 10
	 * @hooked storefront_post_content    - 20
	 */
	do_action('daisy_cat_post_content');

	?>

</article><!-- #post-## -->
