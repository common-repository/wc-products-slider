<?php

/**
 * Fired during plugin activation
 *
 * @link       https://theinnovs.com/wcps
 * @since      1.0.0
 *
 * @package    Wcps
 * @subpackage Wcps/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Wcps
 * @subpackage Wcps/includes
 * @author     The Innovs <theinnovs@gmail.com>
 */
class Wcps_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		self::update_slider_option();
	}

	public static function update_slider_option(){
		update_option( 'wcps_how_many_category', 5 );
		update_option( 'wcps_slider_style', 1 );

		update_option( 'wcps_show_pt_1', 'on' );
		update_option( 'wcps_show_pp_1', 'on' );
		update_option( 'wcps_show_vmb_1', ' ' );
		update_option( 'wcps_show_atcb_1', 'on' );

		update_option( 'wcps_pt_color_1', '#81d742' );
		update_option( 'wcps_pp_color_1', '#2c5e44' );
		update_option( 'wcps_vmb_color_1', '#81d742' );
		update_option( 'wcps_atcb_color_1', '#ffffff' );

		update_option( 'wcps_pt_hover_1', '#81d742' );
		update_option( 'wcps_pp_hover_1', '#2c5e44' );
		update_option( 'wcps_vmb_hover_1', '#81d742' );
		update_option( 'wcps_atcb_hover_1', '#ffffff' );

		update_option( 'wcps_pt_size_1', 18 );
		update_option( 'wcps_pp_size_1', 15 );
		update_option( 'wcps_vmb_size_1', 15 );
		update_option( 'wcps_atcb_size_1', 13 );

		update_option( 'wcps_cb_text_1', 'Add to cart' );
		update_option( 'wcps_vb_text_1', 'View More' );

		update_option( 'wcps_atcb_bg_1', '#1e73be' );
		update_option( 'wcps_atcb_bg_hover_1', '#1e4e84' );
		
		//End slider one

		update_option( 'wcps_show_pt_2', 'on' );
		update_option( 'wcps_show_pp_2', 'on' );
		update_option( 'wcps_show_vmb_2', ' ' );
		update_option( 'wcps_show_atcb_2', 'on' );

		update_option( 'wcps_pt_color_2', '#81d742' );
		update_option( 'wcps_pp_color_2', '#2c5e44' );
		update_option( 'wcps_vmb_color_2', '#81d742' );
		update_option( 'wcps_atcb_color_2', '#ffffff' );

		update_option( 'wcps_pt_hover_2', '#81d742' );
		update_option( 'wcps_pp_hover_2', '#2c5e44' );
		update_option( 'wcps_vmb_hover_2', '#81d742' );
		update_option( 'wcps_atcb_hover_2', '#ffffff' );

		update_option( 'wcps_pt_size_2', 18 );
		update_option( 'wcps_pp_size_2', 15 );
		update_option( 'wcps_vmb_size_2', 15 );
		update_option( 'wcps_atcb_size_2', 13 );

		update_option( 'wcps_cb_text_2', 'Add to cart' );
		update_option( 'wcps_vb_text_2', 'View More' );

		update_option( 'wcps_atcb_bg_2', '#1e73be' );
		update_option( 'wcps_atcb_bg_hover_2', '#1e4e84' );
		// End slider two

		update_option( 'wcps_show_pt_3', 'on' );
		update_option( 'wcps_show_pp_3', 'on' );
		update_option( 'wcps_show_vmb_3', ' ' );
		update_option( 'wcps_show_atcb_3', 'on' );

		update_option( 'wcps_pt_color_3', '#81d742' );
		update_option( 'wcps_pp_color_3', '#2c5e44' );
		update_option( 'wcps_vmb_color_3', '#81d742' );
		update_option( 'wcps_atcb_color_3', '#ffffff' );

		update_option( 'wcps_pt_hover_3', '#81d742' );
		update_option( 'wcps_pp_hover_3', '#2c5e44' );
		update_option( 'wcps_vmb_hover_3', '#81d742' );
		update_option( 'wcps_atcb_hover_3', '#ffffff' );

		update_option( 'wcps_pt_size_3', 18 );
		update_option( 'wcps_pp_size_3', 15 );
		update_option( 'wcps_vmb_size_3', 15 );
		update_option( 'wcps_atcb_size_3', 13 );

		update_option( 'wcps_cb_text_3', 'Add to cart' );
		update_option( 'wcps_vb_text_3', 'View More' );

		update_option( 'wcps_atcb_bg_3', '#1e73be' );
		update_option( 'wcps_atcb_bg_hover_3', '#1e4e84' );
		// End slider three

		update_option( 'wcps_show_pt_4', 'on' );
		update_option( 'wcps_show_pp_4', 'on' );
		update_option( 'wcps_show_vmb_4', ' ' );
		update_option( 'wcps_show_atcb_4', 'on' );

		update_option( 'wcps_pt_color_4', '#81d742' );
		update_option( 'wcps_pp_color_4', '#2c5e44' );
		update_option( 'wcps_vmb_color_4', '#81d742' );
		update_option( 'wcps_atcb_color_4', '#ffffff' );

		update_option( 'wcps_pt_hover_4', '#81d742' );
		update_option( 'wcps_pp_hover_4', '#2c5e44' );
		update_option( 'wcps_vmb_hover_4', '#81d742' );
		update_option( 'wcps_atcb_hover_4', '#ffffff' );

		update_option( 'wcps_pt_size_4', 18 );
		update_option( 'wcps_pp_size_4', 15 );
		update_option( 'wcps_vmb_size_4', 15 );
		update_option( 'wcps_atcb_size_4', 13 );

		update_option( 'wcps_cb_text_4', 'Add to cart' );
		update_option( 'wcps_vb_text_4', 'View More' );

		update_option( 'wcps_atcb_bg_4', '#1e73be' );
		update_option( 'wcps_atcb_bg_hover_4', '#1e4e84' );
		// End slider four


	}

}
