function remove_search(evt){
  $(".dd-search-form, .dd-search-input").addClass("hide-form").removeClass("show-form");
}

function expand_search(evt){
    dd_search = $(this).closest(".dd-search");
    dd_search.find(".dd-search-form").removeClass("hide-form").addClass("show-form");
    dd_search.find(".dd-search-input").removeClass("hide-form").addClass("show-form").css("padding", ".6180469716em").focus();
}


$(document).ready(function(){

  console.log("daisy_theme_scripts loaded");

  /**
   	 * event handler that moves search input box into view
   	 *
  	 */
  $(".dd-search i").click(expand_search);

  /**
   	 * event handler that removes search input box from view
   	 *
  	 */
  $(".dd-search-input").blur(remove_search);

});
