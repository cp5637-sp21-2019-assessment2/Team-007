<?php
add_action('widgets_init', 'progression_studios_latest_widget__load_widgets');

function progression_studios_latest_widget__load_widgets()
{
	register_widget('Progression_studios_Latest_Posts_Featured_Widget_Widget');
}

class Progression_studios_Latest_Posts_Featured_Widget_Widget extends WP_Widget {
	
	function Progression_studios_Latest_Posts_Featured_Widget_Widget()
	{
		$widget_ops = array('classname' => 'pyre_progression_studios_widget_media-feat', 'description' => 'Add a list of latest posts');

		$control_ops = array('id_base' => 'pyre_progression_studios_widget_media-widget-feat');
		
		
		parent::__construct('pyre_progression_studios_widget_media-widget-feat', 'Pro: Latest Posts', $widget_ops, $control_ops);
	}
	

	function widget($args, $instance)
	{
		global $post;
		
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		
		$progression_studios_post_count = $instance['progression_studios_post_count'];
		
		echo $before_widget;
		
		if($title) {
			echo  $before_title.$title.$after_title;
		}
		
	 ?>
	 	
		
		<?php
		
	 	$blogloop = new WP_Query(
	 		array(
	 	        'post_type' => 'post',
				  'ignore_sticky_posts' => 1,
	 	        'posts_per_page' => $progression_studios_post_count,
	 		)
	  	);
		
		?>
		
		
	 
		<ul class="progression-studios-latest-posts-widget">
			<?php while($blogloop->have_posts()): $blogloop->the_post();?>
				<li>
					<?php if(has_post_thumbnail()): ?>
						<div class="latest-posts-widget-image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
					<?php endif; ?>
					
					<a href="<?php the_permalink(); ?>" class="latest-posts-widget-title"><?php the_title(); ?></a>
					<div class="latest-posts-widget-date"><?php the_time(get_option('date_format')); ?></div>
					<div class="clearfix-pro"></div>
				</li>
			<?php  endwhile; // end of the loop. ?>

		</ul><!-- close .progression-studios-latest-posts-widget -->

		
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['progression_studios_post_count'] = $new_instance['progression_studios_post_count'];
	

		return $instance;
	}

	function form($instance)
	{
		
		$defaults = array('title' => 'Recent Posts', 'progression_studios_post_count' => '3');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e( 'Title:', 'zaser-progression' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('progression_studios_post_count'); ?>"><?php esc_html_e( 'Post Count:', 'zaser-progression' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('progression_studios_post_count'); ?>" name="<?php echo $this->get_field_name('progression_studios_post_count'); ?>" value="<?php echo $instance['progression_studios_post_count']; ?>" />
		</p>
	
		
	
		
		
		
		
		
		
	<?php }
}
?>