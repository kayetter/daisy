<?php
/**
 * Actions and filters for daisy theme
 *
 *
 * @package Daisy theme
 * @since 0.2.0
 */


/**
 * The primary navigation menu for theme daisy.
 *
 * Displays content navigation menu
 * @hook action daisy_primary_nav
 * @see header-bizcards.php
 * @package daisy
 */
function daisy_primary_nav(){
	 $product_sub = array(
	          "bizcards-templates" => array(
	          "title" => "Templates"
	        ),
	        "bizcards-custom" => array(
	          "title" => "Custom Bizcards"
	        )
	      );



	 $bizcard_sub = array(
	       'new-bizcard'=>array(
	    'title'=> 'New Bizcard'),
	     'manage-vcards'=>array(),
	     'manage-bizimgs'=>array(),
	     'new-vcard' => array(
	       'title'=> 'New VCard')
	   );
		 require_once(get_stylesheet_directory()."/partials/daisy_primary_nav.php");
}


/**
 * The title section for daisy content-daisy-page
 *
 * Displays content navigation menu
 * @hook action daisy_title_header
 * @see content-daisy.php
 * @package daisy
 */
function daisy_title_header(){ ?>

	<header class="page-header flex-div"> <?php
		the_title( '<h1 class="page-title">', '</h1>' );

		if(is_page('manage-vcards')): ?>

			<h1><a title="Add a new VCard" href="<?php echo get_permalink(get_page_by_path("new-vcard")) ?>"><i class="fa fa-plus" aria-hidden="true"></i></a></h1>
		<?php	endif; ?>
	</header> <?php
}

/**
 * Share buttons used in footer
 *
 * Displays content share buttons
 * @hook action daisy_footer
 * @see content-daisy.php
 * @package daisy
 */
function add_daisy_share_buttons(){
	require_once(get_stylesheet_directory()."/partials/share_buttons.php");

}
/**
 * Footer information for dopey daisy
 *
 * Displays content share buttons
 * @hook action daisy_footer
 * @see content-daisy.php
 * @package daisy
 */
function add_daisy_footer_info(){
	require_once(get_stylesheet_directory()."/partials/daisy_footer.php");
}

/**
 * Category nav menu used in sidebar
 *
 * @hook action daisy_cat_sidebar, 20
 * @see content-daisy.php
 * @package daisy
 */
function daisy_cat_post_submenu(){ ?>

			<div id="daisy-cat-posts" class="daisy-menu daisy-vt-menu daisy-widget widget">
				<?php
					if(is_single()){
						global $post;
						$terms = get_the_terms($post->ID, 'category');
						if(!empty($terms)){
							$term = $terms[0];
						} else { return "";}
					} elseif(is_category()) {
						$term = get_queried_object();
					}

					$title = ucwords($term->name);

					$sub = new WP_Query(array('category_name'=>$term->slug));
					if($sub->have_posts()):
				 ?>

						<a href="<?php echo get_permalink() ?> " class="gamma daisy-widget-title widget-title"><?php echo $title ?></a>
	      		<ul>
						<?php 	while($sub->have_posts()): $sub->the_post();  ?>
        		<li><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></li> <?php
   						endwhile;

							wp_reset_query();
						 ?>

								</ul>
							</div>
			<?php
		endif;

}

/**
 * opening tag for sidebar
 *
 * @hook action daisy_cat_sidebar 10
 * @see content-daisy.php
 * @package daisy
 */
function daisy_cat_sidebar_before(){ ?>

 	<div id="secondary" class="widget-area daisy-widget-area" role="complementary">

	<?php
}
/**
 * closing tag for sidebar
 *
 * @hook action daisy_cat_sidebar, 40
 * @see content-daisy.php
 * @package daisy
 */
function daisy_cat_sidebar_after(){ ?>

 	</div><!-- #secondary --> <?php

}

/**
 * HTML for primary category menu of help topics
 *
 * @hook action daisy_cat, 30
 *
 * @package daisy
 */
function daisy_list_categories($term_name="",$depth=0,$cat_id=0){

		global $wp_query;
		$child_of = 0;

		if($term_name !="" && term_exists($term_name)){
			$child_of = term_exists($term_name);
			}
		if($cat_id != "" && is_category()){
			$cat_id = $wp_query->get_queried_object_id();
		}
		$args = array(
			 'child_of'            => $child_of,
			 'current_category'    => $cat_id,
			 'depth'               => $depth,
			 'echo'                => 1,
			 'exclude'             => get_cat_ID('Uncategorized'),
			 'exclude_tree'        => '',
			 'feed'                => '',
			 'feed_image'          => '',
			 'feed_type'           => '',
			 'hide_empty'          => false,
			 'hide_title_if_empty' => false,
			 'hierarchical'        => true,
			 'order'               => 'ASC',
			 'orderby'             => 'name',
			 'separator'           => '<br />',
			 'show_count'          => 0,
			 'show_option_all'     => '',
			 'show_option_none'    => '',
			 'style'               => 'list',
			 'taxonomy'            => 'category',
			 'title_li'            => "",
			 'use_desc_for_title'  => 0,
			 'walker'							=> new Walker_Category_Find_Parents()
		 );
	 		 $html = '<ul class="dd-top-menu">';
			 $html =	wp_list_categories($args);
			 $html .= '</ul>';
			 return $html;
}


function daisy_category_menu_widget(){ ?>
	<div id="daisy-cat-menu" class="daisy-widget widget daisy-verticle-menu daisy-menu"><span class="gamma daisy-widget-title widget-title"><a href="<?php echo get_permalink(daisy_get_post_id_by_slug("get-help")) ?>">Help Topics</a></span>
		<ul class="dd-top-menu"> <?php
				 echo daisy_list_categories("help",2); ?>
			 </ul>
		 </div> <?php
}
/**
 * Display the post header with a link to the single post
 *
 * @hook daisy_cat_post_content
 * @since 0.2.0
 */
function daisy_post_header() {
	?>
	<header class="entry-header">
	<?php
	if ( is_single() ) {
		the_title( '<h2 class="entry-title">', '</h2>' );
	} else {
		if ( 'post' == get_post_type() ) {
		}

		the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
	}
	?>
	</header><!-- .entry-header -->
	<?php
}
