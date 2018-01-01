<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

/**
 	 * redirects user to 404 page if 1. not logged in and not post author or not admin.
 	 * if not logged in but has proper $_GET dd_pin credentials, user will continue
 	 *
 	 * @hook action "daisy_check_bizcard_credentials"
 	 * @return void
	 */



?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


<?php
wp_head();

?>
</head>

<body <?php body_class(); ?>  >


<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'storefront_before_header' ); ?>

	<header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">
		<div class="col-full">

			<?php
			/**
			 * Functions hooked into storefront_header action
			 *
			 * @hooked storefront_skip_links                       - 0
			 * @hooked storefront_social_icons                     - 10
			 * @hooked storefront_site_branding                    - 20
			 * @hooked storefront_secondary_navigation             - 30
			 * @hooked storefront_product_search                   - 40
			 * @hooked storefront_primary_navigation_wrapper       - 42
			 * @hooked storefront_primary_navigation               - 50
			 * @hooked storefront_header_cart                      - 60
			 * @hooked storefront_primary_navigation_wrapper_close - 68
			 */
			remove_action('storefront_header', 'storefront_header_cart', 60 );
			remove_action('storefront_header', 'storefront_product_search', 40 );
			do_action( 'storefront_header' );
?>
	</header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 */
	do_action( 'storefront_before_content' ); ?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">

		<?php
		/**
		 * Functions hooked in to storefront_content_top
		 *
		 *  @hooked woocommerce_breadcrumb - 10
		 *	@hooked daisy_verify_user' - 0
		 */
	  remove_action( 'storefront_content_top', 'woocommerce_breadcrumb', 10);
		do_action( 'storefront_content_top' );
		?>
