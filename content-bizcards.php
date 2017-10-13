<?php
/**
 * Template used to display single post bizcard content on single or archive pages
 *
 * @package DD
 * @since 0.2.0
 */


?>


<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

<header class='bizcard-entry-header'>

	<div class = "daisy-spinner daisy-hidden" >
		<img src="<?php echo DAISY_PLUGIN_URL."/public/assets/images/DDonVinyl64px.png" ?>" alt="dopey daisy spinner" />
	</div>

	<div class="bizcard-wrapper ">
		<div class = "daisy-message-div">
			<?php
			global $post;
			if( get_query_var("dd_create") == "success" && get_query_var("p") == $post->ID ): ?>

			<h4 style="padding: 1rem 0; text-align: center">You have succesfully created a new Bizcard</h4>

			<?php
			endif; ?>

		</div>

		<?php
			//if is not single putting link around the content
		if(is_post_type_archive("bizcards")): ?>
			<a class = "bizcard-anchor" href="<?php echo get_permalink($post->ID); ?>	">

		<?php endif;
		if(is_page("new-bizcard")): ?>
			<ol>
			 	<li>Add a Biz-image</li>
			 	<li>Fill in your Bizcard display properties -- a title and a tag line.</li>
			 	<li>Enter your unique Bizcard link and a 5 digit security code.</li>
			 	<li>Upload or create a vCard.</li>
			</ol>
		<?php endif; ?>
		<div class="bizimg-div <?php echo is_page("new-bizcard")?"bizimg-select":"" ?>">
			<span  title='Change Daisy Bizimg' class="fa fa-camera daisy-edit-icon <?php echo !is_page("new-bizcard")?"daisy-hidden": "" ?>"></span>
			<?php
				if ( has_post_thumbnail()) {
				the_post_thumbnail( 'large', array('class'=>'bizimg') );
			} else { ?>
				<img class="bizimg-placeholder bizimg" src="<?php echo DAISY_PLUGIN_URL?>public/assets/images/daisy_placeholder.png" alt="<?php the_title(); ?>" >
				<?php } ?>

		</div>
		<?php
		if(is_post_type_archive("bizcards")): ?>
			</a>
		<?php endif; ?>

		<div class='bizcard-display' id='bizcard-display-div'>

				<?php


				the_content();


				the_excerpt();

			if(!is_page("new-bizcard")):

					daisy_vcard_display('link');

					// add status tag to bizcard
					bizcard_status_tag();
				?>
			<?php endif;



				if(current_user_can('delete_plugins')):
					$post_author = get_user_by('ID',$post->post_author);
					$wc_order = get_post_meta($post->ID,"wc-order_id",true);
					$wc_item = get_post_meta($post->ID,"wc-item_id",true);

					?>
					<p>Post Author: <?php echo $post_author->first_name; ?></p>
					<p>Post ID: <?php echo $post->ID; ?></p>
					<?php
					if("publish"==get_post_status()):
						?>
						<p>wc_order: <?php echo $wc_order; ?></p>
						<p>wc_item: <?php echo $wc_item; ?></p>

						<?php
					endif;
				endif;


			 ?>
		 </div><!--  end bizcard-display-div -->


		<div class ="daisy-edit-form">	</div>


	</div>
</header>
	<?php


		/**
		 * adding buttons for editing post only if archive or single bizcard
		 */
 	 if(!is_page("new-bizcard")):

		do_shortcode('[daisy_edit_post_display]');

	endif;




		if(is_single()){
			do_action('daisy_post_navigation');
		}



	?>

</div> <!-- #post-## -->
