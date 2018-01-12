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
	    "title"=> "New Bizcard"),
	     'manage-vcards'=>array(),
	     'new-vcard' => array(
	       "title"=> "New VCard"),
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
 * Category nav menu used in sidebar
 *
 * @hook action daisy_cat_sidebar, 20
 * @see content-daisy.php
 * @package daisy
 */
function daisy_cat_post_submenu(){ ?>

			<div id="daisy-cat-posts" class="daisy-menu daisy-vt-menu daisy-widget widget"><span class="gamma daisy-widget-title widget-title"><?php echo ucwords(single_term_title("",false)) ?></span>
	      <ul>

	    <?php while(have_posts()):
	      the_post(); ?>
	          		<li><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></li> <?php
	     endwhile;
	           ?>

				</ul>
			</div>
			<?php

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
 * @hook action daisy_cat_sidebar, 30
 *
 * @package daisy
 */
function daisy_prim_cat_menu(){
	if(is_category()){
		global $wp_query;
		$cat_id = $wp_query->get_queried_object_id();
		$args = array(
			 'child_of'            => 0,
			 'current_category'    => $cat_id,
			 'depth'               => 2,
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
		 ); ?>
	 <div id="daisy-cat-menu" class="daisy-widget widget daisy-verticle-menu daisy-menu"><span class="gamma daisy-widget-title widget-title">Help Topics</span>
		 <ul class="dd-top-menu"> <?php
		 			wp_list_categories($args); ?>
				</ul>
			</div> <?php
		}
}
/**
 * Display the post header with a link to the single post
 *
 * @hook daisy_loop_post
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
