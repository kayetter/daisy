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
if(is_single()){
	global $post;
	if ( has_post_thumbnail()) { ?>
			<div class="bizimg-div">
			<?php
			the_post_thumbnail( 'large', array('class'=>'bizimg edit-dashicon') );
			 ?>
			<span class="daisy-hidden dashicons dashicons-format-image" title='Change Daisy Bizimg'></span></div>
		 <?php } ?>
		<div class='bizcard-display' id='bizcard-display-div'>
			<?php

			the_content();


			the_excerpt();


			daisy_vcard_display('link');
			?>
		</div><!--  end bizcard-display-div -->
		<?php

		// add status tag to bizcard
		bizcard_status_tag();

		do_shortcode('[daisy_edit_bizcard_form]');
		?>
	</header>


	<button id="edit-bizcard">Edit</button>
	<button id="publish-bizcard">Activate</button>
	<button id="publish-bizcard">Delete</button>
	<?php
	daisy_post_navigation();
} else {
		//puts an anchor tag around the content
		the_content( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
	}

?>
</div> <!-- #post-## -->
