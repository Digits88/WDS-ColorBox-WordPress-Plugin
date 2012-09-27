<?php
/*
Plugin Name: WDS ColorBox
Plugin URI: http://plugins.webdevstudios.com/
Description: Includes ColorBox function, wds_colorbox( $element, $colorbox_params ), (http://www.jacklmoore.com/colorbox) for use in WordPress.
Author: WebdevStudios LLC
Author URI: http://webdevstudios.com
Version: 1.0
*/

define( 'WDSCOLORBOX_URL', plugins_url('/', __FILE__ ) );
// define( 'WDSCOLORBOX_PATH', plugin_dir_path( __FILE__ ) );
// define( 'WDSCOLORBOX_NAME', 'WDS ColorBox' );

add_action( 'init', 'wds_colorbox_register_scripts_styles' );
function wds_colorbox_register_scripts_styles() {

	wp_register_script( 'colorbox', WDSCOLORBOX_URL .'colorbox/colorbox/jquery.colorbox.js', array('jquery'), '1.0' );
	wp_register_script( 'colorbox-init', WDSCOLORBOX_URL .'js/colorbox-init.js', array('jquery'), '1.0' );

	wp_register_style( 'colorbox1', WDSCOLORBOX_URL .'colorbox/example1/colorbox.css', null, '1.0' );
	wp_register_style( 'colorbox2', WDSCOLORBOX_URL .'colorbox/example2/colorbox.css', null, '1.0' );
	wp_register_style( 'colorbox3', WDSCOLORBOX_URL .'colorbox/example3/colorbox.css', null, '1.0' );
	wp_register_style( 'colorbox4', WDSCOLORBOX_URL .'colorbox/example4/colorbox.css', null, '1.0' );
	wp_register_style( 'colorbox5', WDSCOLORBOX_URL .'colorbox/example5/colorbox.css', null, '1.0' );
}

function wds_colorbox( $style = 3, $element = '', $colorbox_params = array() ) {

	$defaults = array(
		// 'hierarchical' => true,
		// 'labels' => $labels,
		// 'show_ui' => true,
		// 'query_var' => true,
		// 'rewrite' => array( 'slug' => $this->slug ),
	);

	$colorbox_params = wp_parse_args( $colorbox_params, $defaults );

	wp_enqueue_script( 'colorbox' );
	wp_enqueue_style( 'colorbox' . (int)$style );

	if ( !empty( $element ) ) {
		wp_enqueue_script( 'colorbox-init' );
		wp_localize_script( 'colorbox-init', 'wdscolorbox', array( 'element' => $element, 'params' => $colorbox_params ) );
	}
}

?>