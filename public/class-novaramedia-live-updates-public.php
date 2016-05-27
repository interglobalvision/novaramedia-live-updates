<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Novaramedia_Live_Updates
 * @subpackage Novaramedia_Live_Updates/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Novaramedia_Live_Updates
 * @subpackage Novaramedia_Live_Updates/public
 * @author     Your Name <email@example.com>
 */
class Novaramedia_Live_Updates_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $novaramedia_live_updates    The ID of this plugin.
	 */
	private $novaramedia_live_updates;

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
	 * @param      string    $novaramedia_live_updates       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $novaramedia_live_updates, $version ) {

		$this->novaramedia_live_updates = $novaramedia_live_updates;
		$this->version = $version;

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
		 * defined in Novaramedia_Live_Updates_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Novaramedia_Live_Updates_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->novaramedia_live_updates, plugin_dir_url( __FILE__ ) . 'css/novaramedia-live-updates-public.css', array(), $this->version, 'all' );

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
		 * defined in Novaramedia_Live_Updates_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Novaramedia_Live_Updates_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->novaramedia_live_updates, plugin_dir_url( __FILE__ ) . 'js/novaramedia-live-updates-public.js', array( 'jquery' ), $this->version, false );

	}

}
