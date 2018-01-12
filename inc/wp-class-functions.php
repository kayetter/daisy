<?php
/**
 * Modified Wordpress Classes
 *
 *
 * @package Daisy theme
 * @since 0.2.0
 */


class Walker_Category_Find_Parents extends Walker_Category {

        function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
                extract($args);
                $cat_name = esc_attr( $category->name );
                $cat_name = apply_filters( 'list_cats', $cat_name, $category );
                $link = '<a href="' . esc_url( get_term_link($category) ) . '" ';
                if ( $use_desc_for_title == 0 || empty($category->description) )
                        $link .= 'title="' . esc_attr( sprintf(__( 'View all posts filed under %s' ), $cat_name) ) . '"';
                else
                        $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
                $link .= '>';

                $link .= $cat_name . '</a>';


                if ( !empty($feed_image) || !empty($feed) ) {
                        $link .= ' ';
                        if ( empty($feed_image) )
                                $link .= '(';
                        $link .= '<a href="' . esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $feed_type ) ) . '"';
                        if ( empty($feed) ) {
                                $alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
                        } else {
                                $title = ' title="' . $feed . '"';
                                $alt = ' alt="' . $feed . '"';
                                $name = $feed;
                                $link .= $title;
                        }
                        $link .= '>';
                        if ( empty($feed_image) )
                                $link .= $name;
                        else
                                $link .= "<img src='$feed_image'$alt$title" . ' />';
                        $link .= '</a>';
                        if ( empty($feed_image) )
                                $link .= ')';
                }
                if ( !empty($show_count) )
                        $link .= ' (' . intval($category->count) . ')';
                if ( 'list' == $args['style'] ) {
                        $output .= "\t<li";
                        $class = 'cat-item cat-item-' . $category->term_id;

                        //add .has-children to li with children
                        $termchildren = get_term_children( $category->term_id, $category->taxonomy );
                          if(count($termchildren)>0){
                              $class .=  ' has-children';
                              //adding a caret to terms with children******
                              if(get_depth($category->term_id) < $depth-1){
                                    $caret =    '<a href="#"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></a>';
                                  }
                          }
                        if ($depth)
                            $class .= ' sub-'.sanitize_title_with_dashes($category->name);


                        if ( !empty($current_category) ) {
                                $_current_category = get_term( $current_category, $category->taxonomy );
                                if ( $category->term_id == $current_category )
                                        $class .=  ' current-cat';
                                elseif ( $category->term_id == $_current_category->parent )
                                        $class .=  ' current-cat-parent';
                        }
                        $output .=  ' class="' . $class . '"';
                        $output .= ">$link.$caret\n";
                } else {
                        $output .= "\t$link.$caret<br />\n";
                }
        } // function start_el

} // class Custom_Walker_Category

function get_depth($id = '', $depth = '', $i = 0)
{
	global $wpdb;

	if($depth == '')
	{
		if(is_page())
		{
			if($id == '')
			{
				global $post;
				$id = $post->ID;
			}
			$depth = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID = '".$id."'");
			return get_depth($id, $depth, $i);
		}
		elseif(is_category())
		{

			if($id == '')
			{
				global $cat;
				$id = $cat;
			}
			$depth = $wpdb->get_var("SELECT parent FROM $wpdb->term_taxonomy WHERE term_id = '".$id."'");
			return get_depth($id, $depth, $i);
		}
		elseif(is_single())
		{
			if($id == '')
			{
				$category = get_the_category();
				$id = $category[0]->cat_ID;
			}
			$depth = $wpdb->get_var("SELECT parent FROM $wpdb->term_taxonomy WHERE term_id = '".$id."'");
			return get_depth($id, $depth, $i);
		}
	}
	elseif($depth == '0')
	{
		return $i;
	}
	elseif(is_single() || is_category())
	{
		$depth = $wpdb->get_var("SELECT parent FROM $wpdb->term_taxonomy WHERE term_id = '".$depth."'");
		$i++;
		return get_depth($id, $depth, $i);
	}
	elseif(is_page())
	{
		$depth = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID = '".$depth."'");
		$i++;
		return get_depth($id, $depth, $i);
	}
}
