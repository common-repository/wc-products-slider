<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://theinnovs.com/wcps
 * @since      1.0.0
 *
 * @package    Wcps
 * @subpackage Wcps/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Wcps
 * @subpackage Wcps/includes
 * @author     The Innovs <theinnovs@gmail.com>
 */

define('WCPS_FILE_DIR', plugin_dir_path(__FILE__));
class Wcps {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Wcps_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'WCPS_VERSION' ) ) {
			$this->version = WCPS_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'wcps';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->wcps_admin_menu_hook();
		
		

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Wcps_Loader. Orchestrates the hooks of the plugin.
	 * - Wcps_i18n. Defines internationalization functionality.
	 * - Wcps_Admin. Defines all hooks for the admin area.
	 * - Wcps_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wcps-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wcps-i18n.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wcps-js.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wcps-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wcps-public.php';

		//require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/wcps-custom-js.php';


		$this->loader = new Wcps_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Wcps_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Wcps_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Wcps_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Wcps_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Wcps_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}



	/**
	 * This menu action hook
	 */
	public function wcps_admin_menu_hook(){
		add_action("admin_menu", array($this,"wcps_admin_menu"));
		add_action('admin_init', array($this,"get_wcps_slider_settings_one"));
		add_action('admin_init', array($this,"get_wcps_slider_settings_two"));
		add_action('admin_init', array($this,"get_wcps_slider_settings_three"));
		add_action('admin_init', array($this,"get_wcps_slider_settings_four"));
		add_action('admin_init', array($this,"get_wcps_slider_settings_five"));
		add_action('admin_init', array($this,"get_wcps_slider_settings_category"));
		
	}
	/**
	 * Create admin menu bar
	 */

	public function wcps_admin_menu(){
                          		
		add_menu_page(
		  __( 'WC Products Slider', 'wcps' ),
			'WC Products Slider',
			'manage_options',
			'wcps_dashboard',
			array($this,'wcps_dashboard_cb'),
			'dashicons-images-alt',
			65);
		add_submenu_page('null','','','manage_options','wcps_slider_one',array($this , 'wcps_slider_one') );
		add_submenu_page('null','','','manage_options','wcps_slider_two',array($this , 'wcps_slider_two') );
		add_submenu_page('null','','','manage_options','wcps_slider_three',array($this , 'wcps_slider_three') );
		add_submenu_page('null','','','manage_options','wcps_slider_four',array($this , 'wcps_slider_four') );
		add_submenu_page('null','','','manage_options','wcps_slider_five',array($this , 'wcps_slider_five') );
		add_submenu_page('null','','','manage_options','wcps_category_slider',array($this , 'wcps_category_slider') );
	}

	public function wcps_dashboard_cb(){
		ob_start();
		require_once WCPS_FILE_DIR . '../admin/partials/wcps-slider-dashboard.php';
		$template = ob_get_contents();
		ob_end_clean();
		echo $template;
	}
	public function wcps_slider_one(){
		ob_start();
		require_once WCPS_FILE_DIR . '../admin/partials/wcps-slider-one.php';
		$template = ob_get_contents();
		ob_end_clean();
		echo $template;
	}
	public function wcps_slider_two(){
		ob_start();
		require_once WCPS_FILE_DIR . '../admin/partials/wcps-slider-two.php';
		$template = ob_get_contents();
		ob_end_clean();
		echo $template;
	}
	public function wcps_slider_three(){
		ob_start();
		require_once WCPS_FILE_DIR . '../admin/partials/wcps-slider-three.php';
		$template = ob_get_contents();
		ob_end_clean();
		echo $template;
	}
	public function wcps_slider_four(){
		ob_start();
		require_once WCPS_FILE_DIR . '../admin/partials/wcps-slider-four.php';
		$template = ob_get_contents();
		ob_end_clean();
		echo $template;
	}
	public function wcps_slider_five(){
		ob_start();
		require_once WCPS_FILE_DIR . '../admin/partials/wcps-slider-five.php';
		$template = ob_get_contents();
		ob_end_clean();
		echo $template;
	}
	public function wcps_category_slider(){
		ob_start();
		require_once WCPS_FILE_DIR . '../admin/partials/wcps-category-slider.php';
		$template = ob_get_contents();
		ob_end_clean();
		echo $template;
	}

	public function get_wcps_slider_settings_one(){

		register_setting('wcps_slider_setting_one','wcps_show_pt_1'); // pt = Product title
		register_setting('wcps_slider_setting_one','wcps_show_pp_1'); // pp = Product Price
		register_setting('wcps_slider_setting_one','wcps_show_vmb_1'); // vmb = View More Button
		register_setting('wcps_slider_setting_one','wcps_show_atcb_1'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_one','wcps_pt_color_1'); // pt = Product title
		register_setting('wcps_slider_setting_one','wcps_pp_color_1'); // pp = Product Price
		register_setting('wcps_slider_setting_one','wcps_vmb_color_1'); // vmb = View More Button
		register_setting('wcps_slider_setting_one','wcps_atcb_color_1'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_one','wcps_pt_hover_1'); // pt = Product title
		register_setting('wcps_slider_setting_one','wcps_pp_hover_1'); // pp = Product Price
		register_setting('wcps_slider_setting_one','wcps_vmb_hover_1'); // vmb = View More Button
		register_setting('wcps_slider_setting_one','wcps_atcb_hover_1'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_one','wcps_pt_size_1'); // pt = Product title
		register_setting('wcps_slider_setting_one','wcps_pp_size_1'); // pp = Product Price
		register_setting('wcps_slider_setting_one','wcps_vmb_size_1'); // vmb = View More Button
		register_setting('wcps_slider_setting_one','wcps_atcb_size_1'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_one','wcps_cb_text_1'); // cb = Cart Button
		register_setting('wcps_slider_setting_one','wcps_vb_text_1'); // vb = View Button

		register_setting('wcps_slider_setting_one','wcps_atcb_bg_1'); // atcb = Add to cart button
		register_setting('wcps_slider_setting_one','wcps_atcb_bg_hover_1'); // atcb = Add to cart button


	}
	public function get_wcps_slider_settings_two(){
		

		register_setting('wcps_slider_setting_two','wcps_show_pt_2'); // pt = Product title
		register_setting('wcps_slider_setting_two','wcps_show_pp_2'); // pp = Product Price
		register_setting('wcps_slider_setting_two','wcps_show_vmb_2'); // vmb = View More Button
		register_setting('wcps_slider_setting_two','wcps_show_atcb_2'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_two','wcps_pt_color_2'); // pt = Product title
		register_setting('wcps_slider_setting_two','wcps_pp_color_2'); // pp = Product Price
		register_setting('wcps_slider_setting_two','wcps_vmb_color_2'); // vmb = View More Button
		register_setting('wcps_slider_setting_two','wcps_atcb_color_2'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_two','wcps_pt_hover_2'); // pt = Product title
		register_setting('wcps_slider_setting_two','wcps_pp_hover_2'); // pp = Product Price
		register_setting('wcps_slider_setting_two','wcps_vmb_hover_2'); // vmb = View More Button
		register_setting('wcps_slider_setting_two','wcps_atcb_hover_2'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_two','wcps_pt_size_2'); // pt = Product title
		register_setting('wcps_slider_setting_two','wcps_pp_size_2'); // pp = Product Price
		register_setting('wcps_slider_setting_two','wcps_vmb_size_2'); // vmb = View More Button
		register_setting('wcps_slider_setting_two','wcps_atcb_size_2'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_two','wcps_cb_text_2'); // cb = Cart Button
		register_setting('wcps_slider_setting_two','wcps_vb_text_2'); // vb = View Button

		register_setting('wcps_slider_setting_two','wcps_atcb_bg_2'); // atcb = Add to cart button
		register_setting('wcps_slider_setting_two','wcps_atcb_bg_hover_2'); // atcb = Add to cart button

	}
	public function get_wcps_slider_settings_three(){
		

		register_setting('wcps_slider_setting_three','wcps_show_pt_3'); // pt = Product title
		register_setting('wcps_slider_setting_three','wcps_show_pp_3'); // pp = Product Price
		register_setting('wcps_slider_setting_three','wcps_show_vmb_3'); // vmb = View More Button
		register_setting('wcps_slider_setting_three','wcps_show_atcb_3'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_three','wcps_pt_color_3'); // pt = Product title
		register_setting('wcps_slider_setting_three','wcps_pp_color_3'); // pp = Product Price
		register_setting('wcps_slider_setting_three','wcps_vmb_color_3'); // vmb = View More Button
		register_setting('wcps_slider_setting_three','wcps_atcb_color_3'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_three','wcps_pt_hover_3'); // pt = Product title
		register_setting('wcps_slider_setting_three','wcps_pp_hover_3'); // pp = Product Price
		register_setting('wcps_slider_setting_three','wcps_vmb_hover_3'); // vmb = View More Button
		register_setting('wcps_slider_setting_three','wcps_atcb_hover_3'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_three','wcps_pt_size_3'); // pt = Product title
		register_setting('wcps_slider_setting_three','wcps_pp_size_3'); // pp = Product Price
		register_setting('wcps_slider_setting_three','wcps_vmb_size_3'); // vmb = View More Button
		register_setting('wcps_slider_setting_three','wcps_atcb_size_3'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_three','wcps_cb_text_3'); // cb = Cart Button
		register_setting('wcps_slider_setting_three','wcps_vb_text_3'); // vb = View Button

		register_setting('wcps_slider_setting_three','wcps_atcb_bg_3'); // atcb = Add to cart button
		register_setting('wcps_slider_setting_three','wcps_atcb_bg_hover_3'); // atcb = Add to cart button

	}
	public function get_wcps_slider_settings_four(){

		register_setting('wcps_slider_setting_four','wcps_show_pt_4'); // pt = Product title
		register_setting('wcps_slider_setting_four','wcps_show_pp_4'); // pp = Product Price
		register_setting('wcps_slider_setting_four','wcps_show_vmb_4'); // vmb = View More Button
		register_setting('wcps_slider_setting_four','wcps_show_atcb_4'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_four','wcps_pt_color_4'); // pt = Product title
		register_setting('wcps_slider_setting_four','wcps_pp_color_4'); // pp = Product Price
		register_setting('wcps_slider_setting_four','wcps_vmb_color_4'); // vmb = View More Button
		register_setting('wcps_slider_setting_four','wcps_atcb_color_4'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_four','wcps_pt_hover_4'); // pt = Product title
		register_setting('wcps_slider_setting_four','wcps_pp_hover_4'); // pp = Product Price
		register_setting('wcps_slider_setting_four','wcps_vmb_hover_4'); // vmb = View More Button
		register_setting('wcps_slider_setting_four','wcps_atcb_hover_4'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_four','wcps_pt_size_4'); // pt = Product title
		register_setting('wcps_slider_setting_four','wcps_pp_size_4'); // pp = Product Price
		register_setting('wcps_slider_setting_four','wcps_vmb_size_4'); // vmb = View More Button
		register_setting('wcps_slider_setting_four','wcps_atcb_size_4'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_four','wcps_cb_text_4'); // cb = Cart Button
		register_setting('wcps_slider_setting_four','wcps_vb_text_4'); // vb = View Button

		register_setting('wcps_slider_setting_four','wcps_atcb_bg_4'); // atcb = Add to cart button
		register_setting('wcps_slider_setting_four','wcps_atcb_bg_hover_4'); // atcb = Add to cart button

	}
	public function get_wcps_slider_settings_five(){

		register_setting('wcps_slider_setting_five','wcps_show_pt_5'); // pt = Product title
		register_setting('wcps_slider_setting_five','wcps_show_pp_5'); // pp = Product Price
		register_setting('wcps_slider_setting_five','wcps_show_vmb_5'); // vmb = View More Button
		register_setting('wcps_slider_setting_five','wcps_show_atcb_5'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_five','wcps_pt_color_5'); // pt = Product title
		register_setting('wcps_slider_setting_five','wcps_pp_color_5'); // pp = Product Price
		register_setting('wcps_slider_setting_five','wcps_vmb_color_5'); // vmb = View More Button
		register_setting('wcps_slider_setting_five','wcps_atcb_color_5'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_five','wcps_pt_hover_5'); // pt = Product title
		register_setting('wcps_slider_setting_five','wcps_pp_hover_5'); // pp = Product Price
		register_setting('wcps_slider_setting_five','wcps_vmb_hover_5'); // vmb = View More Button
		register_setting('wcps_slider_setting_five','wcps_atcb_hover_5'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_five','wcps_pt_size_5'); // pt = Product title
		register_setting('wcps_slider_setting_five','wcps_pp_size_5'); // pp = Product Price
		register_setting('wcps_slider_setting_five','wcps_vmb_size_5'); // vmb = View More Button
		register_setting('wcps_slider_setting_five','wcps_atcb_size_5'); // atcb = Add to cart button

		register_setting('wcps_slider_setting_five','wcps_cb_text_5'); // cb = Cart Button
		register_setting('wcps_slider_setting_five','wcps_vb_text_5'); // vb = View Button

		register_setting('wcps_slider_setting_five','wcps_atcb_bg_5'); // atcb = Add to cart button
		register_setting('wcps_slider_setting_five','wcps_atcb_bg_hover_5'); // atcb = Add to cart button

	}
	public function get_wcps_slider_settings_category(){
		register_setting('wcps_slider_setting_category','number_category');
		register_setting('wcps_slider_setting_category','choose_slider');

	}



}
