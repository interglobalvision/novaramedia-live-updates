<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Novaramedia_Live_Updates
 * @subpackage Novaramedia_Live_Updates/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Novaramedia_Live_Updates
 * @subpackage Novaramedia_Live_Updates/admin
 * @author     Your Name <email@example.com>
 */
class Novaramedia_Live_Updates_Admin {

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
	 * @param      string    $novaramedia_live_updates       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $novaramedia_live_updates, $version ) {

		$this->novaramedia_live_updates = $novaramedia_live_updates;
		$this->version = $version;

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
		 * defined in Novaramedia_Live_Updates_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Novaramedia_Live_Updates_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->novaramedia_live_updates, plugin_dir_url( __FILE__ ) . 'css/novaramedia-live-updates-admin.css', array(), $this->version, 'all' );

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
		 * defined in Novaramedia_Live_Updates_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Novaramedia_Live_Updates_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->novaramedia_live_updates, plugin_dir_url( __FILE__ ) . 'js/novaramedia-live-updates-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register metaboxes
	 *
	 * @since    1.0.0
	 */
	public function add_meta_boxes() {
    /*
     * Add 'Enable Live Updates' metabox for posts.
     */

    add_meta_box( $this->novaramedia_live_updates . '_updates_enabled', 'Live Updates', array( $this, 'update_enabled_callback' ), 'post', 'side' );


  }

  public function update_enabled_callback( $post ) {
    // Add an nonce field so we can check for it later.
    wp_nonce_field( $this->novaramedia_live_updates, $this->novaramedia_live_updates . '_updates_enabled_nonce' );

    // Get set value
    $updates_enabled_value = get_post_meta( $post->ID, 'novara_live_updates_enabled', true );

    // Check
    $checked = $updates_enabled_value == 'on' ? 'checked="true"' : '';

    // Output the metabox
    echo '<p>';
    echo '<label for="novaramedia-live-updates-enabled-metabox"><input type="checkbox" id="novaramedia-live-updates-enabled-metabox" name="novaramedia-live-updates-enabled-metabox" '. $checked . '>Enable Live Updates</label>';
    echo '</p>';

  }

  /**
   * Save metabox values
   */
  public function save_post_meta( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ $this->novaramedia_live_updates . 'updates_enabled_nonce' ] ) && wp_verify_nonce( $_POST[ $this->novaramedia_live_updates . '_updates_enabled_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
      return;
    }

    // Checks for input and sanitizes/saves if needed
    if( isset($_POST['novaramedia-live-updates-enabled-metabox'] ) ) {
      $checked_value = sanitize_text_field( $_POST[ 'novaramedia-live-updates-enabled-metabox' ] );
    } else {
      $checked_value = false;
    }

    update_post_meta( $post_id, 'novara_live_updates_enabled', $checked_value );

  }

  /**
   * Flush cache if W3 cache is installed
   */
  public function flush_w3_cache( $post_id ) {

    if (function_exists('w3tc_flush_post')) {
      w3tc_flush_post($post_id);
    }

  }

  /**
   * Add TinyMCE plugin declaration javascript
   */
  public function add_mce_external_plugins( $plugin_array ) {

    if ( get_user_option( 'rich_editing' ) !== 'true' ) {
      return;
    }

    $plugin_array['divider'] = plugin_dir_url( __FILE__ ) . 'js/novaramedia-live-updates-tinymce.js';
    return $plugin_array;

  }

  /**
   * Add register TinyMCE button
   */
  public function add_mce_buttons( $buttons ) {

    if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
      return;
    }

    array_push( $buttons, 'divider' );
    return $buttons;

  }

}
