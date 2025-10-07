<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/liaisontw
 * @since             1.0.0
 * @package           hidden_Stuff
 *
 * @wordpress-plugin
 * Plugin Name:       collexpander
 * Plugin URI:        https://github.com/liaisontw/hiddenstuff
 * Description:       collexpander plugin hide or show text with a toggle button to swtich.
 * Version:           1.0.0
 * Author:            liason
 * Author URI:        https://github.com/liaisontw/
 * License: 		  GPLv3 or later  
 * License URI: 	  https://www.gnu.org/licenses/gpl-3.0.html  
 * Text Domain:       collexpander
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'HIDDEN_STUFF_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-hidden-stuff-activator.php
 */
function activate_hidden_stuff() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hidden-stuff-activator.php';
	hidden_Stuff_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-hidden-stuff-deactivator.php
 */
function deactivate_hidden_stuff() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hidden-stuff-deactivator.php';
	hidden_Stuff_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_hidden_stuff' );
register_deactivation_hook( __FILE__, 'deactivate_hidden_stuff' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-hidden-stuff.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_hidden_stuff() {

	$plugin = new hidden_Stuff();
	$plugin->run();

}
run_hidden_stuff();
