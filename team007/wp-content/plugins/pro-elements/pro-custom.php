<?php
/*
Plugin Name: Progression Elements
Text Domain: pro-elements
Plugin URI: http://http://progressionstudios.com
Description: This plugin registers custom elements for Progression Studios
Version: 2.2
Author: Progression Studios
Author URI: http://progressionstudios.com/
Author Email: contact@progressionstudios.com
License: GNU General Public License v3.0
*/

/* Translation */
add_action('plugins_loaded', 'pro_elements_textdomain');
function pro_elements_textdomain() {
	load_plugin_textdomain( 'pro-elements', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
define( 'PROGRESSION_PLUGIN_URL', plugin_dir_url( __FILE__ ) );



/**
 * Registering Custom Post Types
 */
/*** Registering Custom Post Type ***/
add_action('init', 'progression_portfolio_init');
function progression_portfolio_init() {	
	
	register_post_type(
		'portfolio',
		array(
			'labels' => array(
				'name' => __( "Portfolio", "pro-elements" ),
				'singular_name' => __( "Portfolio Post", "pro-elements" )
			),
			'menu_icon' => 'dashicons-portfolio',
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'gallery'),
			'supports' => array('title', 'editor', 'excerpt', 'thumbnail','comments', 'post-formats'),
			'can_export' => true,
		)
	);

	register_taxonomy(
		'portfolio-category', 'portfolio', 
		array('hierarchical' => true, 
		'label' => __( "Portfolio Categories", "pro-elements" ), 
		'query_var' => true, 
		'rewrite' => array('slug' => 'portfolio-category'),
		)
	 );

}



/**
 * Enqueue or de-enqueue third party plugin scripts/styles
 */
function progression_studios_plugin_styles_scripts() {
	wp_deregister_style( 'flexslider' );
	wp_deregister_style( 'font-awesome' );
	wp_deregister_style( 'prettyphoto' );
	wp_deregister_script( 'prettyphoto' );
}
add_action( 'wp_enqueue_scripts', 'progression_studios_plugin_styles_scripts', 100 );



// CSS Styles in Admin
function pro_vc_wp_admin_style() {
    wp_register_style( 'pro-vc-styles',  plugin_dir_url( __FILE__ ) . 'assets/style.css' );
    wp_enqueue_style( 'pro-vc-styles' );
}
add_action( 'admin_enqueue_scripts', 'pro_vc_wp_admin_style' );



// Element Shortcodes
if( function_exists( 'vc_manager' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'elements/image-grid-shortcode.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'elements/portfolio-shortcode.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'elements/blog-shortcode.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'elements/shop-shortcode.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'elements/team-shortcode.php' );
}


// Loaded Templates
require_once( plugin_dir_path( __FILE__ ) . 'templates/custom-templates.php' );


?>