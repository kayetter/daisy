<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package storefront
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<?php
	/**
	 * Functions hooked in to daisy_title_header add_action
	 *
	 * @hooked daisy_title_header          - 10
	 */
	 do_action('daisy_title_header');
	/**
	 * Functions hooked in to storefront_page add_action
	 *
	 * @hooked storefront_page_header          - 10
	 * @hooked storefront_page_content         - 20
	 */
 	remove_action('storefront_page', 'storefront_page_header', 10);
	do_action( 'storefront_page' );
	?>
</div><!-- #post-## -->
