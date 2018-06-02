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

	<div id="primary" class="content-area daisy-homepage">
		<main id="main" class="site-main" role="main">

			<div  class='clearfix splash-div'  >

 				<div class='splash-panel' id="splash-copy">
					<?php	the_title(); ?>

					<h2>Digital business cards -- make sharing simple.</h2>
					<p>A device-independent digital business cards solution for all your networking needs. No app required.</p>
				</div>
				<div id='splash-img' class="splash-panel">
					<?php echo has_post_thumbnail()?the_post_thumbnail('full', array( 'alt'=>'iPhone Dopey Daisy digital business card screenshot')):"" ?>
				</div>
				<div id="splash-button-wrap" class="splash-panel">
						<a class="splash-button" href="<?php echo the_permalink(wc_get_page_id("Shop")) ?>">See How</a>
					<?php if(class_exists('Woocommerce')): ?>
						<a class="splash-button" href="<?php echo the_permalink(wc_get_page_id("Shop")) ?>">Shop Now</a>
				<?php endif; ?>
				</div>
			<div id="splash-excerpt" class="splash-panel" >Did you know 80% of all print business cards are thrown away? Rather than leaving it to chance, take control of how people receive your contact information. Share your contact information digitally with a customized, web link preview, Dopey Daisy Bizcard. At the tap of a screen, your contact information is added to any device. Because you don't want to rely on when or if a person will manually enter your information, start sharing the simple way.
			</div>
		</div>
		<div class="flex-div offerings" >

			<div class="offering" id="individual">
				<a href="<?php echo get_permalink(get_page_by_path('shop')) ?>">
				<h2>Bizcard Subscription</h2>
				<h3><sup>$</sup>14.99 <span>/ year</span> </h3>
				<h4>or get a 16% discount on 5 Bizcard Bundle</h4>
				<ul>
					<li>30 day free trial</li>
					<li>Unlimited Bizcards with limited activation</li>
				</ul>
				</a>
			</div>
			<div class="offering" id="enterprise">
				<a href="<?php echo  get_permalink(get_page_by_path('bizcards-enterprise')) ?>">
				<h2>Enterprise</h2>
				<h3>Contact Us</h3>
				<ul>
					<li>+25 Employees</li>
					<li>Use your business's domain</li>
					<li>We will customize to suit your needs</li>
				</ul>
				</a>
			</div>
			<div class="offering" id="custom-design">
				<a href="<?php echo  get_permalink(get_page_by_path('bizcards-custom')) ?>">
					<h2>Custom Design</h2>
					<h3><sup>$</sup>49.99 <span>/ design</span> </h3>
					<ul>
						<li>Full color business card</li>
						<li>Your logo and image</li>
						<li>Print and digital format</li>
						<li>QR code ready</li>
						<li>1 year Dopey Daisy Digital Bizcard subscription included</li>
					</ul>
				</a>
			</div>

		</div>


		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
