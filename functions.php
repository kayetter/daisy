<?php
/**
 * Functions for daisy theme
 *
 *
 * @package Daisy theme
 * @since 0.2.0
 */


$version = "0.2.0";
define("DAISY_THEME_VERSION", $version);

require_once( 'inc/daisy-template-hooked-functions.php');
require_once( 'inc/daisy-template-functions.php');
require_once( 'inc/daisy-storefront-functions.php');


add_action( 'wp_enqueue_scripts', 'load_daisy_styles');
function load_daisy_styles(){
    wp_enqueue_style('daisy-fonts', daisy_fonts_url(), DAISY_THEME_VERSION);
    wp_enqueue_style('storefront', get_template_directory_uri()."/style.css", DAISY_THEME_VERSION);
    wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css',DAISY_THEME_VERSION
   );
    wp_enqueue_script('daisy_theme_scripts', get_stylesheet_directory_uri()."/inc/js/daisy_theme_scripts.js",DAISY_THEME_VERSION);
}




// remove woocommerce styles
// add_filter( 'woocommerce_enqueue_styles', '__return_false' );



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
    	$raleway = _x( 'on', 'Raleway font: on or off', 'daisy' );
    	$PTSans = _x( 'on', 'PTSans font: on or off', 'daisy' );


    		$font_families = array();
            if ( 'off' !== $quicksand ) {

    		$font_families[] = 'Quicksand:400,500,700';
    	}

            if ( 'off' !== $poppins ) {

    		$font_families[] = 'Poppins:400,700';
    	}
            if ( 'off' !== $raleway ) {

    		$font_families[] = 'Raleway:400,500,700';
    	}
            if ( 'off' !== $PTSans ) {

    		$font_families[] = 'PT+Sans:400,700';
    	}




    	if ( in_array('on', array($poppins, $quicksand, $raleway, $PTSans)) ) {

    			$query_args = array(
    			'family' => urlencode( implode( '|', $font_families ) ),
    			'subset' => urlencode( 'latin,latin-ext' ),
    		);

    		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    	}

    	return  $fonts_url;
    }


//add support for woocommerce
add_action('after_setup_theme', 'daisy_theme_support');
function daisy_theme_support(){
  add_theme_support('woocommerce');
  add_theme_support( 'custom-header' );
}
