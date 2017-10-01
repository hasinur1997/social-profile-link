<?php
/**
 * Social Profile Widget Class
 *
 * @setup widget and execute it
 */
class Social_Profile_Widget extends WP_Widget {

	function __construct() {

		parent::__construct(
			'social_profile',
			__('Socail Profile Link', 'ss_l'),

			array('description' => __('Social Profile', 'ss_l'))
		);
	}

	public function widget($args, $instance) {

		extract($args);

		$links = [

			'facebook' => esc_attr($instance['facebook_link']),

			'twitter' => esc_attr($instance['twitter_link']),

			'linkedin' => esc_attr($instance['linkedin_link']),

			'google' => esc_attr($instance['google_link']),

		];

		$icons = [

			'facebook' => esc_attr($instance['facebook_icon']),

			'twitter' => esc_attr($instance['twitter_icon']),

			'linkedin' => esc_attr($instance['linkedin_icon']),

			'google' => esc_attr($instance['google_icon']),
		];

		$width = [
			'width' => esc_attr($instance['width']),
		];

		echo $before_widget;

		$this->get_widget_content($links, $icons, $width);

		echo $after_widget;
	}

	public function get_widget_content($links, $icon, $width) {

		?>
			<div class="social-link">
				<a href="<?php echo esc_attr($links['facebook']); ?>" target="_blank"><img src="<?php echo esc_attr($icon['facebook']); ?>" alt="" width="<?php echo esc_attr($width['width']) ?>"></a>

				<a href="<?php echo esc_attr($links['twitter']); ?>" target="_blank"><img src="<?php echo esc_attr($icon['twitter']); ?>" alt="" width="<?php echo esc_attr($width['width']) ?>"></a>

				<a href="<?php echo esc_attr($links['linkedin']); ?>" target="_blank"><img src="<?php echo esc_attr($icon['linkedin']); ?>" alt="" width="<?php echo esc_attr($width['width']) ?>"></a>

				<a href="<?php echo esc_attr($links['google']); ?>" target="_blank"><img src="<?php echo esc_attr($icon['google']); ?>" alt="" width="<?php echo esc_attr($width['width']) ?>"></a>
			</div>
		<?php
}

	/**
	 * Get Widget form
	 *
	 * @param  object
	 *
	 * @return void
	 */
	public function form($instance) {

		$this->get_form($instance);
	}

	/**
	 * Update Widget Data
	 *
	 * @param  array $new_instance
	 *
	 * @param  array $old_instance
	 *
	 * @return array
	 */
	public function update($new_instance, $old_instance) {

		$instance = [

			'facebook_link' => (!empty($new_instance['facebook_link'])) ? strip_tags($new_instance['facebook_link']) : '',

			'twitter_link' => (!empty($new_instance['twitter_link'])) ? strip_tags($new_instance['twitter_link']) : '',

			'linkedin_link' => (!empty($new_instance['linkedin_link'])) ? strip_tags($new_instance['linkedin_link']) : '',

			'google_link' => (!empty($new_instance['google_link'])) ? strip_tags($new_instance['google_link']) : '',

			'facebook_icon' => (!empty($new_instance['facebook_icon'])) ? strip_tags($new_instance['facebook_icon']) : '',

			'twitter_icon' => (!empty($new_instance['twitter_icon'])) ? strip_tags($new_instance['twitter_icon']) : '',

			'linkedin_icon' => (!empty($new_instance['linkedin_icon'])) ? strip_tags($new_instance['linkedin_icon']) : '',

			'google_icon' => (!empty($new_instance['google_icon'])) ? strip_tags($new_instance['google_icon']) : '',

			'width' => (!empty($new_instance['width'])) ? strip_tags($new_instance['width']) : '',
		];

		return $instance;
	}

	/**
	 * Create Widget backend form
	 *
	 * @param  object $instance
	 *
	 * @return void
	 */
	public function get_form($instance) {

		// Get Facebook Link
		if (isset($instance['facebook_link'])) {

			$facebook_link = $instance['facebook_link'];

		} else {

			$facebook_link = 'http://www.facebook.com';
		}

		// Get Twitter Link

		if (isset($instance['twitter_link'])) {

			$twitter_link = $instance['twitter_link'];

		} else {

			$twitter_link = 'http://twitter.com';
		}

		// Get Linked In
		if (isset($instance['linkedin_link'])) {

			$linkedin_link = $instance['linkedin_link'];

		} else {

			$linkedin_link = 'http://www.linkedin.com';
		}

		// Get google Link

		if (isset($instance['google_link'])) {

			$google_link = $instance['google_link'];

		} else {

			$google_link = 'http://www.google.com';
		}

		// Get Facebook icon
		if (isset($instance['facebook_icon'])) {

			$facebook_icon = $instance['facebook_icon'];

		} else {

			$facebook_icon = plugins_url() . '/social-profile/assets/images/icon/facebook.png';
		}

		// Get Twitter icon
		if (isset($instance['twitter_icon'])) {

			$twitter_icon = $instance['twitter_icon'];

		} else {

			$twitter_icon = plugins_url() . '/social-profile/assets/images/icon/twitter.png';
		}

		// Get Linkedin icon
		if (isset($instance['linkedin_icon'])) {

			$linkedin_icon = $instance['linkedin_icon'];

		} else {

			$linkedin_icon = plugins_url() . '/social-profile/assets/images/icon/linkedin.png';
		}

		// Get Linkedin icon
		if (isset($instance['google_icon'])) {

			$google_icon = $instance['google_icon'];

		} else {

			$google_icon = plugins_url() . '/social-profile/assets/images/icon/google.png';
		}

		// Icon Width

		if (isset($instance['width'])) {

			$icon_width = $instance['width'];

		} else {

			$icon_width = '32';
		}

		?>

				<!-- Facebook -->
				<p>
					<label for="<?php echo $this->get_field_id('facebook_link') ?>">Facebook Link</label>
					<input type="text" class="widefat" name="<?php echo $this->get_field_name('facebook_link') ?>" value="<?php echo $facebook_link ?>">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('facebook_icon') ?>">Facebook Icon</label>
					<input type="text" class="widefat" name="<?php echo $this->get_field_name('facebook_icon') ?>" value="<?php echo $facebook_icon ?>">
				</p>

				<!-- Twitter -->
				<p>
					<label for="<?php echo $this->get_field_id('twitter_link') ?>">Twitter Link</label>
					<input type="text" class="widefat" name="<?php echo $this->get_field_name('twitter_link') ?>" value="<?php echo $twitter_link ?>">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('twitter_icon') ?>">Twitter Icon</label>
					<input type="text" class="widefat" name="<?php echo $this->get_field_name('twitter_icon') ?>" value="<?php echo $twitter_icon ?>">
				</p>


				<!-- Lnkedin -->
				<p>
					<label for="<?php echo $this->get_field_id('linkedin_link') ?>">Linkedin Link</label>
					<input type="text" class="widefat" name="<?php echo $this->get_field_name('linkedin_link') ?>" value="<?php echo $linkedin_link ?>">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('linkedin_icon') ?>">Linkedin Icon</label>
					<input type="text" class="widefat" name="<?php echo $this->get_field_name('linkedin_icon') ?>" value="<?php echo $linkedin_icon ?>">
				</p>

				<!-- Lnkedin -->
				<p>
					<label for="<?php echo $this->get_field_id('google_link') ?>">Google Link</label>
					<input type="text" class="widefat" name="<?php echo $this->get_field_name('google_link') ?>" value="<?php echo $google_link ?>">
				</p>

				<p>
					<label for="<?php echo $this->get_field_id('google_icon') ?>">Google Icon</label>
					<input type="text" class="widefat" name="<?php echo $this->get_field_name('google_icon') ?>" value="<?php echo $google_icon ?>">
				</p>

				<!-- Icon Widht -->
				<p>
					<label for="<?php echo $this->get_field_id('width') ?>">Icon Width</label>
					<input type="text" name="<?php echo $this->get_field_name('width') ?>" class="widefat" value="<?php echo esc_attr($icon_width) ?>">
				</p>
		<?php

	}
}