<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Novaramedia_Live_Updates
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Plugin Boilerplate
 * Plugin URI:        http://example.com/novaramedia-live-updates-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Your Name or Your Company
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       novaramedia-live-updates
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-novaramedia-live-updates-activator.php
 */
function activate_novaramedia_live_updates() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-novaramedia-live-updates-activator.php';
	Novaramedia_Live_Updates_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-novaramedia-live-updates-deactivator.php
 */
function deactivate_novaramedia_live_updates() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-novaramedia-live-updates-deactivator.php';
	Novaramedia_Live_Updates_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_novaramedia_live_updates' );
register_deactivation_hook( __FILE__, 'deactivate_novaramedia_live_updates' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-novaramedia-live-updates.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_novaramedia_live_updates() {

	$plugin = new Novaramedia_Live_Updates();
	$plugin->run();

}
run_novaramedia_live_updates();
