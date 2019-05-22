<?php
add_action('widgets_init', 'our_hours_load_widgets');

function our_hours_load_widgets()
{
	register_widget('Our_Hours_Widget');
}

class Our_Hours_Widget extends WP_Widget {
	
	function Our_Hours_Widget()
	{
		$widget_ops = array('classname' => 'hours', 'description' => 'Location Hours.');

		$control_ops = array('id_base' => 'our-hours-widget');

		parent::__construct('our-hours-widget', 'Pro: Opening Hours', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$mon_date = $instance['mon_date'];
		$tues_date = $instance['tues_date'];
		$weds_date = $instance['weds_date'];
		$thurs_date = $instance['thurs_date'];
		$fri_date = $instance['fri_date'];
		$sat_date = $instance['sat_date'];
		$sun_date = $instance['sun_date'];

		echo $before_widget;

		if($title) {
			echo  $before_title.$title.$after_title;
		} ?>
			

			<ul class="progression-studios-open-hours">
				<?php if($mon_date): ?><li>
					<div class="date-day-pro"><?php esc_html_e( 'Monday', 'zaser-progression' ); ?></div><div class="hours-date-pro"><?php echo esc_attr( $mon_date ); ?></div><div class="clearfix-pro"></div>
				</li><?php endif; ?>
				<?php if($tues_date): ?><li>
					<div class="date-day-pro"><?php esc_html_e( 'Tuesday', 'zaser-progression' ); ?></div><div class="hours-date-pro"><?php echo esc_attr( $tues_date ); ?></div><div class="clearfix-pro"></div>
				</li><?php endif; ?>
				<?php if($weds_date): ?><li>
					<div class="date-day-pro"><?php esc_html_e( 'Wednesday', 'zaser-progression' ); ?></div><div class="hours-date-pro"><?php echo esc_attr( $weds_date ); ?></div><div class="clearfix-pro"></div>
				</li><?php endif; ?>
				<?php if($thurs_date): ?><li>
					<div class="date-day-pro"><?php esc_html_e( 'Thursday', 'zaser-progression' ); ?></div><div class="hours-date-pro"><?php echo esc_attr( $thurs_date ); ?></div><div class="clearfix-pro"></div>
				</li><?php endif; ?>
				<?php if($fri_date): ?><li>
					<div class="date-day-pro"><?php esc_html_e( 'Friday', 'zaser-progression' ); ?></div><div class="hours-date-pro"><?php echo esc_attr( $fri_date ); ?></div><div class="clearfix-pro"></div>
				</li><?php endif; ?>
				<?php if($sat_date): ?><li>
					<div class="date-day-pro"><?php esc_html_e( 'Saturday', 'zaser-progression' ); ?></div><div class="hours-date-pro"><?php echo esc_attr( $sat_date ); ?></div><div class="clearfix-pro"></div>
				</li><?php endif; ?>
				<?php if($sun_date): ?><li>
					<div class="date-day-pro"><?php esc_html_e( 'Sunday', 'zaser-progression' ); ?></div><div class="hours-date-pro"><?php echo esc_attr( $sun_date ); ?></div><div class="clearfix-pro"></div>
				</li><?php endif; ?>
			</ul>
			<div class="clearfix-pro"></div>
	
		
		
		<?php echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['mon_date'] = $new_instance['mon_date'];
		$instance['tues_date'] = $new_instance['tues_date'];
		$instance['weds_date'] = $new_instance['weds_date'];
		$instance['thurs_date'] = $new_instance['thurs_date'];
		$instance['fri_date'] = $new_instance['fri_date'];
		$instance['sat_date'] = $new_instance['sat_date'];
		$instance['sun_date'] = $new_instance['sun_date'];
		
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Opening Hours', 'mon_date' => '8am - 11pm', 'tues_date' => '8am - 11pm', 'weds_date' => '8am - 11pm', 'thurs_date' => '8am - 11pm', 'fri_date' => '11 AM - 11 PM', 'sat_date' => '11 AM - 11 PM', 'sun_date' => 'Closed');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e( 'Title:', 'zaser-progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('mon_date'); ?>"><?php esc_html_e( 'Monday Hours', 'zaser-progression' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('mon_date'); ?>" name="<?php echo $this->get_field_name('mon_date'); ?>" value="<?php echo $instance['mon_date']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('tues_date'); ?>"><?php esc_html_e( 'Tuesday Hours', 'zaser-progression' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('tues_date'); ?>" name="<?php echo $this->get_field_name('tues_date'); ?>" value="<?php echo $instance['tues_date']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('weds_date'); ?>"><?php esc_html_e( 'Wednesday Hours', 'zaser-progression' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('weds_date'); ?>" name="<?php echo $this->get_field_name('weds_date'); ?>" value="<?php echo $instance['weds_date']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('thurs_date'); ?>"><?php esc_html_e( 'Thursday Hours', 'zaser-progression' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('thurs_date'); ?>" name="<?php echo $this->get_field_name('thurs_date'); ?>" value="<?php echo $instance['thurs_date']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('fri_date'); ?>"><?php esc_html_e( 'Friday Hours', 'zaser-progression' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('fri_date'); ?>" name="<?php echo $this->get_field_name('fri_date'); ?>" value="<?php echo $instance['fri_date']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('sat_date'); ?>"><?php esc_html_e( 'Saturday Hours', 'zaser-progression' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('sat_date'); ?>" name="<?php echo $this->get_field_name('sat_date'); ?>" value="<?php echo $instance['sat_date']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('sun_date'); ?>"><?php esc_html_e( 'Sunday Hours', 'zaser-progression' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('sun_date'); ?>" name="<?php echo $this->get_field_name('sun_date'); ?>" value="<?php echo $instance['sun_date']; ?>" />
		</p>
		
	<?php
	}
}
?>