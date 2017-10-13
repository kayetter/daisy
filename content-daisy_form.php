<?php
/**
 * Template used to display post content bizcard submit form.
 *
 * @package DD
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class='bizcard-entry-header'>
<?php
if(is_page()){
	global $post;
	// do_action('daisy_messages');
		?>

		<div class='bizcard-display' id='bizcard-display-div'>
			<?php

			the_content();


			the_excerpt();


			?>
		</div><!--  end bizcard-display-div -->

	</header>

</div> <!-- #post-## -->
<?php } ?>
