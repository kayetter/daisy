<?php
/**
 * The template for displaying search results pages.
 *
 * @package storefront
 */
?>
<div class ="dd-search flex-div">
  <i class="fa fa-search fa-lg" id="" aria-hidden="true"></i>
  <form action="/" method="get" class="dd-search-form hide-form">
      <input type="text" name="s" class="fa-placeholder dd-search-input hide-form" value="<?php the_search_query(); ?>" placeholder="Search" />
      <input type="submit" name="submit" value="">
  </form>
</div>
