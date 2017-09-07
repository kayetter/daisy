<?php
/**
 * Template used to display post content on single pages.
 *
 * @package storefront
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class='bizcard-entry-header'>
<?php
if(is_page()){
	global $post;
	do_action('daisy_messages');
		?>
		<h4 class='bizimg-title bizimg-select'>1. Upload Bizcard Image<span  title='Change Daisy Bizimg' class="fa fa-camera"></span></h4>
		<div class="bizimg-div bizimg-select">
				<img class="bizimg-placeholder bizimg border-blue" src="<?php echo get_stylesheet_directory_uri(); ?>/images/daisy_placeholder.png" alt="<?php the_title(); ?>" />
			<?php } ?>
		</div>
		<div class='bizcard-display' id='bizcard-display-div'>
			<?php

			the_content();


			the_excerpt();


			?>
		</div><!--  end bizcard-display-div -->

	</header>

</div> <!-- #post-## -->
