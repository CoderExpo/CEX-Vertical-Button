<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://coderexpo.com/
 * @since      1.0.0
 *
 * @package    Cex_Vertical_Button
 * @subpackage Cex_Vertical_Button/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cex_Vertical_Button
 * @subpackage Cex_Vertical_Button/admin
 * @author     CoderExpo Team <info@coderexpo.com>
 */
class Cex_Vertical_Button_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action( 'tf_create_options', array( $this, 'admin_page' ) );

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Cex_Vertical_Button_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cex_Vertical_Button_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cex-vertical-button-admin.css', array(), $this->version, 'all' );

	} 


	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */

	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Cex_Vertical_Button_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cex_Vertical_Button_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cex-vertical-button-admin.js', array( 'jquery' ), $this->version, false );

	}


	public function admin_page()
	{
		$titan = TitanFramework::getInstance( 'cex-vertical-button' );
		
		$panel = $titan->createAdminPanel( array(
			'name' => 'CEX Vertical Button',
			'desc' => 'The settings page for Vertical Button.',
			'parent' => 'options-general.php',
			'id' => 'cex-vertical-button',

		));

		$panel->createOption( array(
			'type' => 'save',
		));

		$panel->createOption( array(
			'name' => 'Button Text',
			'id' => 'button_text',
			'type' => 'text',
			'desc' => 'This is the button text you want to show.',
			'default' => 'Contact',
			'placeholder' => 'your button Text',
	  	));
	  
		$panel->createOption( array(
			'name' => 'Button URL',
			'id' => 'button_url',
			'type' => 'text',
			'desc' => 'This is the button URL where you want your visitor to go.',
			'default' => get_site_url(),
			'placeholder' => get_site_url(),
		  ));
		  
		  $panel->createOption( array(
			'name' => 'Button Position',
			'id' => 'button_position',
			'options' => array(
				'left' => 'Left',
				'right' => 'Right',
			),
			'type' => 'radio',
			'desc' => 'Select  Position of the button',
			'default' => 'right',
			));

			$panel->createOption( array(
				'name' => 'Distance from top',
				'id' => 'button_top',
				'type' => 'number',
				'desc' => 'Button distance from top in percentange(%)',
				'default' => '30',
				'max' => '100',
			));

			$panel->createOption( array(
				'type' => 'save',
			));


	}

}
