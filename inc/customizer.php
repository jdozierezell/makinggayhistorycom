<?php
/**
 * makinggayhistory Theme Customizer.
 *
 * @package makinggayhistory
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function making_gay_history_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('background_image');
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('widgets');

	// Helpful site is https://premium.wpmudev.org/blog/wordpress-theme-customization-api/?utm_expid=3606929-84.YoGL0StOSa-tkbGo-lVlvw.0&utm_referrer=https%3A%2F%2Fpremium.wpmudev.org%2Fblog%2Fcreating-custom-controls-wordpress-theme-customizer%2F

	$wp_customize->add_section( 
		'makinggayhistory_header_options', 
		array(
			'title'       => __( 'Header Settings', 'makinggayhistory' ),
			'priority'    => 100,
			'capability'  => 'edit_theme_options',
			'description' => __('Change header options here.', 'makinggayhistory'), 
		) 
	);
	$wp_customize->add_setting( 'header_image',
		array(
			'type' 				=> 'theme_mod',
			'capability'	=> 'edit_theme_options',
			'transport'		=> 'postMessage',
			'default' 		=> ''
		)
	);     
	$wp_customize->add_control( new WP_Customize_Media_Control( 
		$wp_customize, 
		'header_image_control',
		array(
			'label'    => __( 'Header Image', 'makinggayhistory' ), 
			'section'  => 'makinggayhistory_header_options',
			'settings' => 'header_image',
			'priority' => 10,
		) 
	)); 



}
add_action( 'customize_register', 'making_gay_history_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function making_gay_history_customize_preview_js() {
	wp_enqueue_script( 'making_gay_history_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'making_gay_history_customize_preview_js' );
