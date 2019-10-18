<?php 
/*
	Plugin Name: Gym Fitness - Widgets
	Plugin URI:
	Description: Adds a custom widgets in a wordpress panel
	Version: 1.0
	Author: Hiral Goyani
	Author URI: 
	Text Domain: gymfitness
*/

if(!defined('ABSPATH')) die();

/**
 * Adds Foo_Widget widget.
 */
class GymFitness_Classes_Widgets extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'gymfitness_classes', // Base ID
			esc_html__( 'GymFitness - Classes List', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Display different classes in the Widget', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		$quantity = $instance['quantity'];
		?>
		<h2 class="text-primary text-center classes-header">
			<?php echo $instance['title']; ?>
		</h2>
		<ul class="sidebar-classes-list">
			<?php 
				$args = array(
					'post_type' => 'gymfitness_classes',
					'posts_per_page' => $quantity,
				);
				$classes = new WP_Query($args);
				while($classes->have_posts()): $classes->the_post();
			?>
			
			<li class="sidebar-class">
				
				<div class="sidebar-widgets-image">
					<?php the_post_thumbnail('thumbnail'); ?>
				</div>

				<div class="class-content">
					<a href="<?php the_permalink(); ?>" title="">
						<h3 class="text-primary"><?php the_title(); ?></h3>					
					</a>

					<?php 
						$start_time = get_field('start_time');
						$end_time = get_field('end_time');
					?>
					<p><?php echo the_field('class_days') . " - " . $start_time . " to " . $end_time; ?></p>
				</div>				

			</li>

		<?php endwhile; wp_reset_postdata(); ?>
		</ul>

		<?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		$quantity = ! empty( $instance['quantity'] ) ? $instance['quantity'] : esc_html__( '1', 'text_domain' );

		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
			<?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'quantity' ) ); ?>">
			<?php esc_attr_e( 'Amount of classes to Display :', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'quantity' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'quantity' ) ); ?>" type="number" value="<?php echo esc_attr( $quantity ); ?>" min="1">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['quantity'] = ( ! empty( $new_instance['quantity'] ) ) ? sanitize_text_field( $new_instance['quantity'] ) : '';

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function gymfitness_classes_widget() {
    register_widget( 'GymFitness_Classes_Widgets' );
}
add_action( 'widgets_init', 'gymfitness_classes_widget' );

