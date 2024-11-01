<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://theinnovs.com/wcps
 * @since      1.0.0
 *
 * @package    Wcps
 * @subpackage Wcps/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wcps
 * @subpackage Wcps/admin
 * @author     The Innovs <theinnovs@gmail.com>
 */
class Wcps_Admin {

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
		 * defined in Wcps_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wcps_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( $this->plugin_name . '_wcps-bootstrap', plugin_dir_url( __FILE__ ) . 'css/wcps-bootstrap.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . '_wcps-jquery.lighter', plugin_dir_url( __FILE__ ) . 'css/wcps-jquery.lighter.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . '_wcps-bootstrap-toggle', plugin_dir_url( __FILE__ ) . 'css/wcps-bootstrap-toggle.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . '_wcps-font-awosome', plugin_dir_url( __FILE__ ) . 'css/wcps-font-awosome.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . '_wcps-select2', plugin_dir_url( __FILE__ ) . 'css/wcps-select2.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . '_wcps-owl.carousel.min', plugin_dir_url( __FILE__ ) . 'css/wcps-owl.carousel.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . '_wcps-owl.theme.default.min', plugin_dir_url( __FILE__ ) . 'css/wcps-owl.theme.default.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . 'wcps-admin', plugin_dir_url( __FILE__ ) . 'css/wcps-admin.css', array(), $this->version, 'all' );
		

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
		 * defined in Wcps_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wcps_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		// wp_enqueue_script( 'jquery' );
		// wp_enqueue_script( $this->plugin_name.'_wcps-slider-3d-gallery', plugin_dir_url( __FILE__ ) . 'js/wcps-slider-3d-gallery.js', array( 'jquery' ), $this->version, true );
		// wp_enqueue_script( $this->plugin_name.'_wcps-slider-3d-gallery-modernizr', plugin_dir_url( __FILE__ ) . 'js/wcps-slider-3d-gallery-modernizr.custom.js', array( 'jquery' ), $this->version, false );
		
		wp_enqueue_script( 'jquery' );
		//wp_enqueue_script( $this->plugin_name . '_wcps-main-js', plugin_dir_url( __FILE__ ) . 'js/wcps-main.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'wp-color-picker');
		wp_enqueue_script( $this->plugin_name . '_wcps-bootstrap-js', plugin_dir_url( __FILE__ ) . 'js/wcps-bootstrap.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '_wcps-jquery.lighter', plugin_dir_url( __FILE__ ) . 'js/wcps-jquery.lighter.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '_wcps-bootstrap-toggle', plugin_dir_url( __FILE__ ) . 'js/wcps-bootstrap-toggle.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '_wcps-select2', plugin_dir_url( __FILE__ ) . 'js/wcps-select2.full.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '_wcps-owl.carousel.min', plugin_dir_url( __FILE__ ) . 'js/wcps-owl.carousel.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '_wcps-admin', plugin_dir_url( __FILE__ ) . 'js/wcps-admin.js', array( 'jquery' ), $this->version );

	}

}



