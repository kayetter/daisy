<?php
/**
 * Share button html
 *
 * @hook action('daisy_footer')
 * @package Daisy theme
 * @since 0.2.0
 */
  ?>

<!-- Facebook share button -->
<div class="daisy-footer" id="daisy-footer-share">
  <p>Like us? Share us.</p>
  <div class="flex-div">

    <a class="share-button" href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),'facebook-share-dialog','width=626,height=436');return false;">
      <i class="fa fa-facebook fa-lg"></i>
    </a>
    <a class="share-button" target="_blank"
  href="https://twitter.com/intent/tweet?text=<?php echo urlencode("The coolest in electronic business cards ").home_url() ?>">
      <i class="fa fa-twitter fa-lg" aria-hidden="true"></i>
    </a>
    <a class="share-button" target="_blank"
    href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo home_url() ?>&title=<?php echo urlencode("Dopey Daisy Electronic Bizcards")?>&summary=<?php echo urlencode("Sharing made simple.")?>&source=<?php echo home_url() ?>">
      <i class="fa fa-linkedin fa-lg" aria-hidden="true"></i>
    </a>
  </div>
</div>
