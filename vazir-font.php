<?php
/**
 * @package vazir-font
 * @version 1.0
 */
/*
Plugin Name: وزیر
Plugin URI: https://ava-crm.ir
Description: فونت وزیر برای وردپرس
Author: SadeghPM
Version: 1.0
Author URI: https://github.com/sadeghpm
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

register_activation_hook( __FILE__, 'vazir_font_plugin_activation' );

function vazir_font_plugin_activation() {
	if ( ! get_option( 'vazir-font' ) ) {
		$options = array(
			'active'    => 'active',
			'cdn_url'   => 'https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v32.102/Vazirmatn-font-face.css',
			'font_name' => 'Vazirmatn'
		);

		add_option( 'vazir-font', $options );
	}
}

require_once plugin_dir_path( __FILE__ ) . '/inc/option.php';
require_once plugin_dir_path( __FILE__ ) . '/inc/front-head.php';
require_once plugin_dir_path( __FILE__ ) . '/inc/dashboard-head.php';
