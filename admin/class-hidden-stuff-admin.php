<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/liaisontw
 * @since      1.0.0
 *
 * @package    hidden_Stuff
 * @subpackage hidden_Stuff/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    hidden_Stuff
 * @subpackage hidden_Stuff/admin
 * @author     liason <liaison.tw@gmail.com>
 */
class hidden_Stuff_Admin {

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
		add_action( 'admin_menu', array($this, 'admin_menu') );

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
		 * defined in hidden_Stuff_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The hidden_Stuff_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/hidden-stuff-admin.css', array(), $this->version, 'all' );

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
		 * defined in hidden_Stuff_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The hidden_Stuff_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/hidden-stuff-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
     * hidden_stuff_menu_settings function.
     * Add a menu item
     * @access public
     * @return void
     */

	public function admin_menu() {
		add_options_page( 'hidden Stuff Options', 
						  'hidden Stuff', 
						  'manage_options', 
						  'hidden_stuff_options', 
						  array(&$this, 'hidden_stuff_menu_options')				  
		);
	}

	public function hidden_stuff_menu_options() {
		//$tabs = $this->settings->rmwp_get_tabs();

    // Check user capabilities
     if ( ! current_user_can( 'manage_options' ) ) {
        return;
     }
?>
<div class="wrap">
    <h1><?php 
		echo esc_html( get_admin_page_title() ); 
	?></h1>
     
    <h2 class="nav-tab-wrapper">
    </h2>
            <p>
                Please follow the example of shortcode setting below.
            </p>
            <hr />
            <p>
                <strong style="font-size: 14px">Shortcode</strong><br/>
                [show-content][hide-content]
            </p>
            <hr />
			<?php 
				for ($i=1; $i<4; $i++) {
					$button = '<button name="hidden-show" type="button">';
					$button .= 'Hide Show';
					$button .= '</button>';	
					$output = '<p><span class="hidden-show-'.$i.'"';
					$output .= '" id="hidden-show">';
					$output .= $button;
					$output .= '</span></p>';
					echo $output; 
				}
			?>            
</div>
<?php
	}
}
