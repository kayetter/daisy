/**
 * Script file for daisy theme actions
 *
 *
 * @hook 'wp_enqueue_scripts'
 * @package Daisy theme
 * @since 0.2.0
 */
var $ = jQuery.noConflict();

/**
   * removes the search box when document is selected
   *
   */
function remove_search(evt){
  $(".dd-search-form, .dd-search-input").addClass("hide-form").removeClass("show-form");
}

/**
   * expands search box when search icon is selected
   *
   */
function expand_search(evt){
    dd_search = $(this).closest(".dd-search");
    dd_search.find(".dd-search-form").removeClass("hide-form").addClass("show-form");
    dd_search.find(".dd-search-input").removeClass("hide-form").addClass("show-form").css("padding", ".6180469716em").focus();
}

/**
   * expands search box when search icon is selected
   *
   */
function toggle_submenu(evt){
  if(!$(evt.target).is("a")){
    evt.preventDefault();
  }
  console.log(evt.type);
  if($(this).find("ul").hasClass("show-children")){
    $(this).find("ul").removeClass("show-children");
  } else {
    $(this).find("ul").addClass("show-children");
  }
}





/**
 ***************************************************************
 *
 *              Document Ready Calls
 *
 *      Event handlers on document ready
 * *************************************************************
 */

$(document).ready(function(){

  console.log("daisy_theme_scripts loaded");

  /**
   	 * event handler that moves search input box into view
   	 *
  	 */
  // $(".dd-search i").on("click hover", expand_search);
  $(".dd-search i").on("click mouseover", expand_search);

  /**
   	 * event handler that removes search input box from view
   	 *
  	 */
  $(".dd-search-input").blur(remove_search);

  /**
     * event handler that toggles show-children class
     *
     */
  $(".has-children").on("mouseenter click", toggle_submenu);

  /**
     * on mouse leave of submenu ul target, dd-display_submenu class is removed
     *
     */
  $(".has-children").on("mouseleave", function(evt){
    setTimeout(function(){
      if($(evt.target).closest("ul").hasClass("show-children")){
        $(evt.target).closest("ul").removeClass("show-children");
      }
      if($(evt.target).is(".has-children") && $(evt.target).find("ul").hasClass("show-children")){
        $(evt.target).find("ul").removeClass("show-children");
      }
    },500);

  });

  $("#dd-hamburger a").on("click", function(evt){
    evt.preventDefault();
    $("#dd-primary-nav").toggleClass("dd-hamburger-menu");
  });

});
