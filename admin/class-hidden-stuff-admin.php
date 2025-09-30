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
		add_options_page( 'collexpander Options', 
						  'collexpander', 
						  'manage_options', 
						  'collexpander_options', 
						  array(&$this, 'hidden_stuff_menu_options')				  
		);
	}

	public function hidden_stuff_menu_options() 
	{
		$hidden_stuff_active      = get_option( 'hidden_stuff_active' );
		$hidden_stuff_text        = get_option( 'hidden_stuff_text' );
		$hidden_stuff_button_type = get_option( 'hidden_stuff_button_type' );
		if ( !$hidden_stuff_active      ) $hidden_stuff_active      = 'yes';
		if ( !$hidden_stuff_text        ) $hidden_stuff_text        = 'Show Hide';
		if ( !$hidden_stuff_button_type ) $hidden_stuff_button_type = '1';

		// Check user capabilities
		if ( current_user_can( 'manage_options' ) ) {
			if (   isset($_POST[ 'hidden_stuff_submit_hidden' ]) 
			&& $_POST[ 'hidden_stuff_submit_hidden' ] == 'Y' ) 
			{ 
				if (   isset($_POST['hidden_stuff_nonce'])
					&& wp_verify_nonce( 
						sanitize_text_field(wp_unslash($_POST['hidden_stuff_nonce'])),
						'hidden-stuff-nonce' 
					) 
				) 
				{
					if ( isset($_POST[ 'hidden_stuff_button_type' ]) ) {
						$hidden_stuff_button_type = filter_var( 
							wp_unslash($_POST[ 'hidden_stuff_button_type' ]), 
							FILTER_SANITIZE_FULL_SPECIAL_CHARS 
						); 
					} else {
						$hidden_stuff_button_type = '1';
					}
					update_option('hidden_stuff_button_type', $hidden_stuff_button_type);
					//echo '<div class="updated"><p><strong>' . esc_html('Settings saved.') .$hidden_stuff_button_type. '</strong></p></div>';

					if ( isset($_POST[ 'hidden_stuff_text' ]) ) {
						$hidden_stuff_text = filter_var( 
							wp_unslash($_POST[ 'hidden_stuff_text' ]), 
							FILTER_SANITIZE_FULL_SPECIAL_CHARS 
						); 
					} else {
						$hidden_stuff_text = 'Show Hide';
					}
					update_option('hidden_stuff_text', $hidden_stuff_text);
				}
				else {
					wp_die(esc_html('Form failed nonce verification.'));   
				}
			} 
		}

		$hidden_stuff_button_type = get_option('hidden_stuff_button_type');
		$hidden_stuff_text        = get_option( 'hidden_stuff_text' );
		$button_text = explode(' ', $hidden_stuff_text);
		$show_content = $button_text[0];
		$hide_content = $button_text[1];
		$output = '';
		for ($i=1; $i<4; $i++) {
			$button = '<button name="button-show" type="button">';
			//$button .= 'Show';
			$button .= $show_content;
			$button .= '</button>';					
			$button .= '<button name="button-hide" type="button">';
			//$button .= 'Hide';
			$button .= $hide_content;
			$button .= '</button>';					
			$output .= '<p><span class="hidden-show-'.$i.'"';
			$output .= ' id="hidden-show">';
			$output .= '<input type="radio" id="buttonType-'.$i;
			$output .= '" name="hidden_stuff_button_type" value="'.$i;
			if ($i == $hidden_stuff_button_type) {
				$output .= '" checked/>';
			} else {
				$output .= '" />';
			}
			//$output .= '<label for="">';
			$output .= $button;
			//$output .= '</label></span></p>';
			$output .= '</span></p>';
		}
?>

<div class="wrap" id="hidden_stuff">
	<h2>hidden Stuff Settings</h2>
		<p>
			Please follow the example of shortcode setting below.
		</p>
		<hr />
		<p>
			<strong style="font-size: 14px">Shortcode</strong><br/>
			[collexpander-show-content] The content to be hidden dynamically [collexpander-hide-content]
		</p>
		<hr />		
		<form name="form1" method="post" action="">
			<input type="hidden" name="hidden_stuff_nonce" value="<?php echo esc_html(wp_create_nonce('hidden-stuff-nonce')); ?>">
			<input type="hidden" name="hidden_stuff_submit_hidden" value="Y">
			<table border="1" class="form-table" >
			
			<?php 
				//echo ( $output ); 
			?>
			
			<?php 
				for ($i=1; $i<4; $i++) {				
			?>		
			<p>
				<span class="hidden-show-<?php echo esc_attr( $i );?>" id="hidden-show">
				<input type="radio" id="buttonType-<?php echo esc_attr($i);?>"	
					name="hidden_stuff_button_type" value="
					<?php
						if ($i == $hidden_stuff_button_type) {
							echo esc_html('" checked/>');
						} else {
							echo esc_html('" />');
						}
					?>
				">
				<button name="button-show" type="button">
					<?php echo esc_html($show_content); ?>
				</button>
				<button name="button-hide" type="button">
					<?php echo esc_html($hide_content); ?>
				</button>						
				</span>
			</p>
			<?php 
				}
			?>


			<?php esc_html_e( "Button Text", 'collexpander' ); ?>
			<select id="hidden_stuff_text" name="hidden_stuff_text">
				<option value="Show Hide" <?php echo ($hidden_stuff_text=='Show Hide' ? 'selected' : ''); ?> >Show Hide</option>
				<option value="More Less" <?php echo ($hidden_stuff_text=='More Less' ? 'selected' : ''); ?> >More Less</option>
			</select>
			<p class="submit">
				<input type="submit" name="submit" class="button button-primary" value="<?php esc_attr_e('Save Changes', 'collexpander') ?>" />
			</p> 
		
		</form>   
	</div>
<?php
	}
}
