<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package storefront
 */

get_header('bizcard'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div id="splash-div"  >

 				<div class='splash-panel' id="splash-copy">
					<h1>Dopey Daisy<br> Electronic Business Cards
					</h1>
					<p>A device-independent e-business card solution for all your networking needs. No app required.</p>
					<div class="splash-button-wrap">
 						<a class="splash-button" href="<?php echo the_permalink(wc_get_page_id("Shop")) ?>">See How</a>
 						<a class="splash-button" href="<?php echo the_permalink(wc_get_page_id("Shop")) ?>">Shop Now</a>
					</div>
 				</div>
				<?php echo has_post_thumbnail()?the_post_thumbnail('full', array('id'=>'splash-img', 'alt'=>'iPhone Bizcard screenshot', 'class'=>'splash-panel')):"" ?>
 			</div>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
