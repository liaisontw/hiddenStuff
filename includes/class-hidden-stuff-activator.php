<?php

/**
 * Fired during plugin activation
 *
 * @link       https://github.com/liaisontw
 * @since      1.0.0
 *
 * @package    hidden_Stuff
 * @subpackage hidden_Stuff/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    hidden_Stuff
 * @subpackage hidden_Stuff/includes
 * @author     liason <liaison.tw@gmail.com>
 */
class hidden_Stuff_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		add_option( 'hidden_stuff_active', 'yes' );
		add_option( 'hidden_stuff_text', 'Hide Show' );
		add_option( 'hidden_stuff_padding', '..' );
		add_option( 'hidden_stuff_button_type', '1' );
	}

}
