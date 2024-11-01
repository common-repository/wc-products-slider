<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://theinnovs.com/wc-products-slider
 * @since             1.0.0
 * @package           Wcps
 *
 * @wordpress-plugin
 * Plugin Name:       WooCommerce Advanced Slider
 * Plugin URI:        https://wordpress.org/plugins/wc-products-slider
 * Description:       Advanced & 3D slider for WooCommerce Products & Category
 * Version:           1.1.3.4
 * Author:            TheInnovs
 * Author URI:        https://theinnovs.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wc-products-slider
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
define( 'WCPS_VERSION', '1.1.3.4' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wcps-activator.php
 */
function activate_wcps() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wcps-activator.php';
	Wcps_Activator::activate();
}


function wcps_my_error_notice() {
	$active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
	if ( !in_array( 'woocommerce/woocommerce.php', $active_plugins ) ) {
		$message = "You have to install WooCommerce plugin to run Woo Products Slider";
	
    ?>
    <div class="error notice">
        <p><?php _e( $message, 'wc-products-slider' ); ?></p>
    </div>
	<?php
	}
}
add_action( 'admin_notices', 'wcps_my_error_notice' );

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wcps-deactivator.php
 */
function deactivate_wcps() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wcps-deactivator.php';
	Wcps_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wcps' );
register_deactivation_hook( __FILE__, 'deactivate_wcps' );



/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wcps.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wcps() {

	$plugin = new Wcps();
	$plugin->run();

}
run_wcps();




