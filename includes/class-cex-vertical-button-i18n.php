<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://coderexpo.com/
 * @since      1.0.0
 *
 * @package    Cex_Vertical_Button
 * @subpackage Cex_Vertical_Button/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Cex_Vertical_Button
 * @subpackage Cex_Vertical_Button/includes
 * @author     CoderExpo Team <info@coderexpo.com>
 */
class Cex_Vertical_Button_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'cex-vertical-button',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
