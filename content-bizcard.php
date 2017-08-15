<?php
/**
 * Template used to display post content on single pages.
 *
 * @package storefront
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php


	/**
	 * Functions hooked into daisy_single_bizcard add_action
	 *
	 * @hooked daisy_bizcard_header          - 10
	 * @hooked daisy_bizcard_content          - 20

	 * @hooked storefront_init_structured_data - 40 -- not sure if this is needed
	 */


	do_action( 'daisy_single_bizcard' );

	/**
	 * Functions hooked in to storefront_single_post_bottom action
	 *
	 * @hooked storefront_post_nav         - 10
	 * @hooked storefront_display_comments - 20
	 */
	remove_action('storefront_single_post_bottom', 'storefront_display_comments', 20);

	do_action( 'storefront_single_post_bottom' );
	?>

</div><!-- #post-## -->
