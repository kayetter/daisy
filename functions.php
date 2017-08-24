<?php

add_action( 'wp_enqueue_scripts', 'load_daisy_styles' );

require 'inc/daisy-functions.php';
require 'inc/daisy-template-hooked-functions.php';
require 'inc/daisy-template-functions.php';


function load_daisy_styles(){
wp_enqueue_style('daisy-fonts', daisy_fonts_url());
wp_enqueue_style('storefront', get_template_directory_uri()."/style.css");
wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
wp_enqueue_style('load-ptsans', 'https://fonts.googleapis.com/css?family=PT+Sans');
}

//add poppins and quicksand
function daisy_fonts_url() {
    	$fonts_url = '';

    	/*
    	 * Translators: If there are characters in your language that are not
    	 * supported by quicksand, Poppins this to 'off'. Do not translate
    	 * into your own language.
    	 */

    	$quicksand = _x( 'on', 'Quicksand font: on or off', 'daisy' );
    	$poppins = _x( 'on', 'Poppins font: on or off', 'daisy' );


    		$font_families = array();
            if ( 'off' !== $quicksand ) {

    		$font_families[] = 'Quicksand:400,500,700';
    	}

            if ( 'off' !== $poppins ) {

    		$font_families[] = 'Poppins:400,700';
    	}


    	if ( in_array('on', array($poppins, $quicksand)) ) {

    			$query_args = array(
    			'family' => urlencode( implode( '|', $font_families ) ),
    			'subset' => urlencode( 'latin,latin-ext' ),
    		);

    		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    	}

    	return esc_url_raw( $fonts_url );
    }


//add support for woocommerce
add_action('after_setup_theme', 'daisy_theme_support');
function daisy_theme_support(){
  add_theme_support('woocommerce');
  add_theme_support( 'custom-header' );
}
