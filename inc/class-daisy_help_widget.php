<?php
/**
 * An extension of WP_widget to create custom Bizcard widget
 *
 *
 * @package    DD
 */

/**
 * Custom Bizcard Widget tallies bizcard statistics like number of bizcard
 * subscriptions, number of redeemed (active) bizcards and number of unredeemed
 *
 * @since    0.2.0
 */

 if ( ! defined( 'ABSPATH' ) ) {
   exit;
 }

class Daisy_Help_Widget extends WP_Widget {
  public $widget_desc;
  protected $sub_status;
  public function __construct() {
    global $wp_query;
    $widget_options = array(
      'classname' => 'daisy-widget-area',
      'description' => 'Displays list of FAQ help items',
    );
    parent::__construct( 'help_widget', 'Bizcard Help Widget', $widget_options );

  }

  public function widget( $args, $instance ) {
    $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'FAQs and Tips' );
    $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );


    echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];
    $args = array(
      'category_name' => 'faq, share',
      'posts_per_page' =>5,
      'orderby'=> 'rand'
    );
    $tips = new WP_Query($args);

    if($tips->have_posts()): ?>
    <div class="daisy-verticle-menu daisy-menu daisy-widget widget">


    <ul class="">

      <?php  while($tips->have_posts()):  $tips->the_post(); ?>

        <li ><a class="daisy-widget-anchor" href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a> </li>

      <?php
        endwhile;
      endif;
      ?>    </ul></div></div> <?php
      wp_reset_query();
  }

public function form( $instance) {

    $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : esc_attr('Bizcard Stats');
    ?>
    <p>Displays Bizcard Help List</p>
    <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widget" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

    <?php
  }

public function update( $new_instance, $old_instance ) {
     $instance = $old_instance;
     $instance['title'] = strip_tags($new_instance['title']);
     return $instance;
 }

}


function register_daisy_help_widget() {
  register_widget( 'Daisy_Help_Widget' );
}
add_action( 'widgets_init', 'register_daisy_help_widget' );
