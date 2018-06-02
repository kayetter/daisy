<?php
/**
 * Daisy Template Hooks
 *
 * @since 0.2.0
 * @package Daisy Theme
 */

//create daisy_primary_nav action which includes storefront nav wrapper and site branding
add_action('daisy_primary_nav', 'storefront_site_branding',10);
add_action('daisy_primary_nav', 'storefront_primary_navigation_wrapper',20);
add_action('daisy_primary_nav', 'daisy_primary_nav', 30);
add_action('daisy_primary_nav', 'storefront_primary_navigation_wrapper_close', 40);

//Content title section for daisy_page_template.php
add_action('daisy_title_header', 'daisy_title_header', 10);

//Daisy footer content
add_action('daisy_footer', 'add_daisy_share_buttons', 10);
add_action('daisy_footer', 'add_daisy_footer_info', 20);

//Daisy Sidebar on Category Pages
add_action('daisy_cat_sidebar', 'daisy_cat_sidebar_before', 10);
add_action('daisy_cat_sidebar', 'daisy_cat_post_submenu', 20, 1);
add_action('daisy_cat_sidebar', 'daisy_category_menu_widget', 30);
add_action('daisy_cat_sidebar', 'daisy_cat_sidebar_after', 40);

//display category menu for help
add_action('daisy_cat', 'daisy_list_categories', 10,3);

//displays content of post
add_action('daisy_cat_post_content', 'daisy_post_header', 10);
add_action('daisy_cat_post_content', 'storefront_post_content', 20);
add_action('daisy_cat_post_content', 'daisy_related_links', 30);


//displays post excerpt on category loop
add_action('daisy_cat_loop_content', 'daisy_cat_loop_content', 10);

//post navigation for category pages

add_action('storefront_single_post_bottom', 'daisy_category_page_nav', 10);
