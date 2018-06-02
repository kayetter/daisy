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
 * @see header-bizcard.php
 * @package daisy
 */
function daisy_primary_nav(){
	 $product_sub = array(
	          "bizcards-templates" => array(
	          "title" => "Templates"
	        ),
	        "bizcards-enterprise" => array(
	          "title" => "Enterprise"
	        ),
					"bizcards-custom" => array(
						"title" => "Design Services"
					)
	      );



	 $bizcard_sub = array(
	       'new-bizcard'=>array(
	    'title'=> 'New Bizcard'),
			'new-vcard' => array(
				'title'=> 'New VCard'),
	     'manage-vcards'=>array(),
	     'manage-bizimgs'=>array()
	   );
		 if ( class_exists( 'WooCommerce' ) ) {
		 require_once(get_stylesheet_directory()."/partials/daisy_primary_nav.php");
	 }
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
 * @hook action daisy_cat_sidebar, 20, 1
 * @see content-daisy.php
 * @package daisy
 */
function daisy_cat_post_submenu($cat=""){
	if($cat==""){
		return;
	}

	$category = get_the_category_by_ID($cat);

	$title = ucwords($category); ?>
	<div id="daisy-cat-posts" class="daisy-menu daisy-verticle-menu daisy-widget widget">
		<span class="gamma daisy-widget-title widget-title">
			<a href="<?php echo get_category_link($cat) ?>" > <?php echo $title ?></a>
		</span>
	<?php

	//if category has children display child category links
	if(category_has_children($cat)):

		$categories = get_categories(array('parent'=>$cat));?>
		<ul>
			<?php		foreach($categories as $category):	?>
				<li><a href="<?php echo get_category_link($category->term_id) ?>"><?php echo ucwords($category->name) ?></a></li>
			<?php endforeach; ?>
		</ul>

	<?php  else:
		//otherwise get 4 posts from the current category excluding the current post
		global $post;

			$args = array(
				'posts_per_page'=> 4,
				'cat'=>$cat,
				'meta_key' => 'dd_sort',
				'post__not_in'=> array($post->ID),
				'orderby' => 'meta_value_num',
				'order' => 'ASC'
			);



			$sub = new WP_Query($args);

			if($sub->have_posts()):	 ?>
  			<ul>
				<?php 	while($sub->have_posts()): $sub->the_post();  ?>
    			<li><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></li> <?php
						endwhile;

					wp_reset_query(); ?>

				</ul>
			<?php	endif;
		endif; ?>
		</div> <?php
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
	global $post;
	$cat = get_the_category($post->ID);
	?>
	<header class="entry-header">
	<?php
	if ( is_single()) {
		if($cat[0]->slug=='help'){
			the_title('<h1>','</h1>');
		} else {

		the_title( '<h2 class="entry-title">', '</h2>' );
		if($cat[0]->slug != 'help'){
			echo the_category(" | ",'multiple');
		}
	}

	} else {
		if ( 'post' == get_post_type() ) {
		}

		the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
	}
	?>
	</header><!-- .entry-header -->
	<?php
}

/**
 * Display the related links meta
 *
 * @hook daisy_cat_post_content
 * @since 2.4.0
 */
 function daisy_related_links(){
	 global $post;
	 $links = get_post_meta($post->ID,'related_links',true);
	 if($links): ?>
	 <ul class="post-ul"><strong>See related help topics:</strong>
	 <?php foreach($links as $link):  ?>
			 	<li> <a  href="<?php echo get_permalink($link) ?>" ><?php echo get_the_title($link) ?></a></li>
		<?php endforeach; ?>
		</ul>
	<?php endif;

 }

/**
 * get adjacent post link by category
 * @see daisy_category_page_nav
 * @param string $link_type next | prev
 * @since 2.0.3
 * @return string html anchor with category link
 */
function get_adjacent_cat_link($link_type='next') {
	global $post;
	$post_id = $post->ID; // current post ID
	$cat = get_the_category();
	$current_cat_id = $cat[0]->cat_ID; // current category ID

	$args = array(
	    'category' => $current_cat_id,
			'meta_key' => 'dd_sort',
	    'orderby'  => 'dd_sort',
	    'order'    => 'ASC'
	);
	$posts = get_posts( $args );
	// get IDs of posts retrieved from get_posts
	$ids = array();
	foreach ( $posts as $thepost ) {
	    $ids[] = $thepost->ID;
	}
	// get and echo previous and next post in the same category
	$thisindex = array_search( $post_id, $ids );
	$previd    = isset( $ids[ $thisindex - 1 ] ) ? $ids[ $thisindex - 1 ] : 0;
	$nextid    = isset( $ids[ $thisindex + 1 ] ) ? $ids[ $thisindex + 1 ] : 0;

	if ( $previd && $link_type=='prev') {
	    return '<a rel="prev" href="'.get_permalink($previd).'">'.get_the_title($previd).'</a>';
	}
	if ( $nextid && $link_type=='next') {
		return '<a rel="next" href="'.get_permalink($nextid).'">'.get_the_title($nextid).'</a>';
	}
	return "";
}


/**
 * Daisy category page navigation linkes
 *
 * @hook storefront_single_post_bottom
 * @since 2.0.3
 * @return string html page navigation
 */
function daisy_category_page_nav() {	?>
	<nav id="post-navigation" class="navigation post-navigation" role="navigation" aria-label="Post Navigation"><span class="screen-reader-text">Post navigation</span><div class="nav-links">
	    <div class="nav-previous">
	        <?php echo get_adjacent_cat_link('prev')?>
	    </div>
	    <div class="nav-next">
	        <?php echo get_adjacent_cat_link('next'); ?>
	    </div>
		</div><!-- #nav-above -->
	</nav>
	<?php
}


/**
 * Returns excerpt content for loop-category
 *
 * @hooked daisy_cat_loop_content
 */
function daisy_cat_loop_content() {
	?>
	<div class="entry-header">
		<h2>
			<a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a>
		</h2>
		<div class="breadcrumb">
			<?php echo the_category(' | ','multiple'); ?>
		</div>
	</div>
	<div class="entry-content">
	<?php

	if(is_category('help')){
		the_content(
			sprintf(
				__( 'Continue reading %s', 'storefront' ),
				'<daisy/css class="screen-reader-text">' . get_the_title() . '</span>'
			)
		);
	} else {

		the_excerpt();
	}



	// do_action( 'storefront_post_content_after' );

	wp_link_pages( array(
		'before' => '<div class="page-links">' . __( 'Pages:', 'storefront' ),
		'after'  => '</div>',
	) );
	?>
	</div><!-- .entry-content -->
	<?php
}
