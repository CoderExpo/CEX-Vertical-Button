<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://coderexpo.com/
 * @since      1.0.0
 *
 * @package    Cex_Vertical_Button
 * @subpackage Cex_Vertical_Button/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Cex_Vertical_Button
 * @subpackage Cex_Vertical_Button/public
 * @author     CoderExpo Team <info@coderexpo.com>
 */
class Cex_Vertical_Button_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action( 'wp_footer', array($this, 'button_display'), 100 );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cex-vertical-button-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cex-vertical-button-public.js', array( 'jquery' ), $this->version, false );

	}

	public function button_display()
	{
		$titan = TitanFramework::getInstance( 'cex-vertical-button' );
		$text = $titan->getOption( 'button_text' );
		$url = $titan->getOption( 'button_url' );
		$position = $titan->getOption( 'button_position' );
		$top = $titan->getOption( 'button_top' );

		ob_start();

		if($position == 'right'):
		?>
		<style> 
			.cex-vertical-button{ 
				right: 62px; 
				-ms-transform: rotate(-90deg); /* IE 9 */
				-ms-transform-origin: 100% 0; /* IE 9 */
				-webkit-transform: rotate(-90deg); /* Safari 3-8 */
				-webkit-transform-origin: 100% 0; /* Safari 3-8 */
				transform: rotate(-90deg);
				transform-origin: 100% 0;
				top: <?php echo $top; ?>%;
			} 
		</style>
		<?php else : ?>
		<style> 
			.cex-vertical-button{ 
				left: 62px; 
				-ms-transform: rotate(90deg); /* IE 9 */
				-ms-transform-origin:  0 0; /* IE 9 */
				-webkit-transform: rotate(90deg); /* Safari 3-8 */
				-webkit-transform-origin:  0 0; /* Safari 3-8 */
				transform: rotate(90deg);
				transform-origin: 0 0;
				top: <?php echo $top; ?>%;
			} 
		</style>
		<?php endif; ?>
		<a href="<?php echo esc_url($url);?>" class="cex-vertical-button"><?php echo $text;?></a>
		<?php
		echo ob_get_clean();
	}

}
