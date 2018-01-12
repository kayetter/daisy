<div id="secondary" class="widget-area" role="complementary">

		<div id="recent-posts-4" class="widget widget_recent_entries">		<span class="gamma widget-title">What’s New</span>
      <ul>

<?php while(have_posts()):
  the_post(); ?>
      		<li><a href="<?php echo get_the_title() ?>"><?php echo get_the_title() ?></a></li> <?php
 endwhile;
           ?>

			</ul>
		</div>

  </div><!-- #secondary -->
