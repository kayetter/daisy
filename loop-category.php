<?php
/**
 * The loop template file.
 *
 * Included on pages like index.php, archive.php and search.php to display a loop of posts
 * Learn more: http://codex.wordpress.org/The_Loop
 *
 * @package storefront
 */

do_action( 'storefront_loop_before' );

	if(is_category("help")){
		$posts = get_posts(array('numberposts'=>1,'name'=>'get-help') );
		foreach ($posts as $post):
			setup_postdata($post);
			get_template_part( 'content', 'category');
		endforeach;
	} else {

	while ( have_posts() ) : the_post();
		/**
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
		get_template_part( 'content', 'category');
		// $terms = get_the_terms($post, 'category');
		// foreach($terms as $term){
		// 	echo $term->name;
		// }

	endwhile;
}

/**
 * Functions hooked in to storefront_paging_nav action
 *
 * @hooked storefront_paging_nav - 10
 */
 if(!is_category('help')){

	 do_action( 'storefront_loop_after' );
 }
