<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/liaisontw
 * @since      1.0.0
 *
 * @package    hidden_Stuff
 * @subpackage hidden_Stuff/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    hidden_Stuff
 * @subpackage hidden_Stuff/public
 * @author     liason <liaison.tw@gmail.com>
 */
class hidden_Stuff_Public
{

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
    public function __construct( $plugin_name, $version )
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
        add_action('plugins_loaded', array($this, 'init_hidden_stuff'));
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

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

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/hidden-stuff-public.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

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

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/hidden-stuff-public.js', array( 'jquery' ), $this->version, false);

    }

    public function init_hidden_stuff()
    {
        add_shortcode('collexpander-show-content', array($this, 'hidden_stuff_show_content'));
        add_shortcode('collexpander-hide-content', array($this, 'hidden_stuff_hide_content'));
    }

    /**
     * [collexpander-show-content]
     *
     * @since    1.0.0
     */
    function hidden_stuff_show_content()
    {
        // Construct the output elements.
        $hidden_stuff_text        = get_option('hidden_stuff_text');
        $button_text = explode(' ', $hidden_stuff_text);
        $show_content = $button_text[0];
        $hidden_stuff_button_type = get_option('hidden_stuff_button_type');
        $hiddenShowDivId = wp_rand();
        
        $button = '<button name="hidden-show" type="button" ';
        $button .= 'onclick="hiddenShowToggle('.esc_html($hiddenShowDivId);
        $button .= ')" id="button-'.esc_html($hiddenShowDivId).'">';
        $button .= esc_html($show_content);    
        $button .= '</button>';
        $output = '<span class="hidden-show-'.esc_html($hidden_stuff_button_type).'"';
        $output .= ' id="hidden-show-wrap">';
        $output .= $button;
        $output .= '</span>';
        $output .= '<div id="hiddenShowDiv-'.esc_html($hiddenShowDivId).'" style="display: none">';

        return $output;
    }

    /**
     * [collexpander-hide-content]
     *
     * @since    1.0.0
     */
    function hidden_stuff_hide_content()
    {
        // Set the closing element.
        $output = "</div><div class='hidden-show-wrap-end' id='hidden-show-wrap-end'></div>";

        return $output;
    }

}


