<?php
/*
Plugin Name: Social Profile
Plugin URI: https://wordpress.org/social-profile/
Description: Used for socail profile link in wordpress widget
Version: 0.1
Author: Hasinur Rahman
Author URI: https://facebook.com/hasinurrhaman44
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: social_profile
Domain Path: /languages
 */
/**
 * Copyright (c) YEAR Your Name (email: Email). All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * **********************************************************************
 */

/**
 * Social Profile Class
 *
 * @class set up social profile
 */
class Social_Profile {

	function __construct() {

		$this->init_hooks();

		$this->includes();
	}

	/**
	 * Instantiate Social Profile Class
	 *
	 * @return social profile class object
	 */
	public static function init() {

		static $instance = false;

		if (!$instance) {

			$instance = new Social_Profile();
		}

		return $instance;
	}

	/**
	 * Init all hooks
	 *
	 * @return void
	 */
	public function init_hooks() {

		add_action('widgets_init', array($this, 'initialize_widget_register'));
	}

	/**
	 * Includes All neccessary file for the socail profile
	 *
	 * @return void
	 */
	public function includes() {

		require_once plugin_dir_path(__FILE__) . 'includes/social-profile-widget-class.php';
	}

	/**
	 * Call back for widget initialization
	 *
	 * @return void
	 */
	public function initialize_widget_register() {

		register_widget('Social_Profile_Widget');
	}
}

Social_Profile::init();
