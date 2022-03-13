<?php
/**
 * newspotrika Theme Customizer
 *
 * @package newspotrika
 */

function newspotrika_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	// Load customize sanitize.
	require_once trailingslashit( get_template_directory() ) . 'inc/customizer/sanitize.php';

	// Load Partial.
	require_once trailingslashit( get_template_directory() ) . 'inc/customizer/general/partial.php';

	// ***GENERAL****//	
	
	// Load customize panels.
	require_once trailingslashit( get_template_directory() ) . 'inc/customizer/general/panels.php';
	// Load customize sections.
	require_once trailingslashit( get_template_directory() ) . 'inc/customizer/general/sections.php';
	// Load customize settings.
	require_once trailingslashit( get_template_directory() ) . 'inc/customizer/general/settings.php';
	// Load customize controls.
	require_once trailingslashit( get_template_directory() ) . 'inc/customizer/general/controls.php';

}
add_action( 'customize_register', 'newspotrika_customize_register' );