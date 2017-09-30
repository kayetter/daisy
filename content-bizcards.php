<?php
/**
 * Template used to display post content on single pages.
 *
 * @package storefront
 */


if(is_user_logged_in()):
?>


<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<header class='bizcard-entry-header <?php if(is_single()){echo 'edit-post';} ?>'>
	<?php
		//if is not single putting link around the content
	if(!is_single()){ ?>
		<a href="
		<?php echo get_permalink($post->ID); ?>
		">

	<?php } ?>
		<div class="bizimg-div">
		<span  title='Change Daisy Bizimg' class="fa fa-camera daisy-hidden daisy-edit-icon"></span>
		<?php
			if ( has_post_thumbnail()) {
			the_post_thumbnail( 'large', array('class'=>'bizimg') );
		} else { ?>
						<img class="bizimg-placeholder bizimg" src="<?php echo get_stylesheet_directory_uri(); ?>/images/daisy_placeholder.png" alt="<?php the_title(); ?>" />
						<?php } ?>
		</div>
		<div class='bizcard-display' id='bizcard-display-div'>
			<?php


			the_content();


			the_excerpt();

		?>
		</div><!--  end bizcard-display-div -->
		<?php
			daisy_vcard_display('link');

			// add status tag to bizcard
			bizcard_status_tag();

			if(current_user_can('delete_plugins')){
				$post_author = get_user_by('ID',$post->post_author);
				$wc_order = get_post_meta($post->ID,"wc-order_id",true);
				$wc_item = get_post_meta($post->ID,"wc-item_id",true);

				?>
				<p>Post Author: <?php echo $post_author->first_name; ?></p>
				<p>Post ID: <?php echo $post->ID; ?></p>
				<?php
				if("publish"==get_post_status()){
					?>
					<p>wc_order: <?php echo $wc_order; ?></p>
					<p>wc_item: <?php echo $wc_item; ?></p>

					<?php
				}
			}

		if(!is_single()){ ?>
			</a> <?php }

		/**
		 * Functions hooked into daisy_messages
		 *
		 * @hooked 'Daisy_Errors', 'daisy_display_errors', 0
		 *
		 */
	if(is_single()){
		do_action('daisy_messages');
		do_shortcode('[daisy_edit_bizcard_form]');
		}
	?>
	</header>
	<?php


		/**
		 * adding buttons for editing post
		 * Functions hooked into daisy_after_header
		 *
		 * @hooked 'daisy_edit_post_display', 0
		 * @hooked 'daisy_post_navigation', 10
		 *
		 */
		do_action('daisy_after_bizcard');
		if(is_single()){
			do_action('daisy_post_navigation');
		}



?>

</div> <!-- #post-## -->

<?php endif ?>
