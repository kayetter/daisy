<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 *
 *
 * Template name: Daisy Homepage
 *
 * @package daisy
 */

get_header('bizcard'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div id="splash-div"  >

 				<div class='splash-panel' id="splash-copy">
					<h1>Dopey Daisy Bizcards</h1>
					<h2>Digital business cards -- make sharing simple.</h2>
					<p>A device-independent digital business card solution for all your networking needs. No app required.</p>
					<?php if(class_exists('Woocomerce')): ?>
					<div class="splash-button-wrap">
 						<a class="splash-button" href="<?php echo the_permalink(wc_get_page_id("Shop")) ?>">See How</a>
 						<a class="splash-button" href="<?php echo the_permalink(wc_get_page_id("Shop")) ?>">Shop Now</a>
					</div>
				<?php endif; ?>
 				</div>
				<?php echo has_post_thumbnail()?the_post_thumbnail('full', array('id'=>'splash-img', 'alt'=>'iPhone Bizcard screenshot', 'class'=>'splash-panel')):"" ?>
 			</div>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
