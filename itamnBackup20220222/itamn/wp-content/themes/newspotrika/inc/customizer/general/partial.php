<?php 

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'        => '.navbar-brand',
		'render_callback' => 'newspotrika_customize_partial_blogname',
	) );
	
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'        => '.site-desc',
		'render_callback' => 'newspotrika_customize_partial_blogdescription',
	) );

	$wp_customize->selective_refresh->add_partial( 'control_footer_widgets', array(
		'selector' => '.site-footer',
	) );

	$wp_customize->selective_refresh->add_partial( 'control_footer_text', array(
		'selector' => '.footer_text',
	) );

}


// Callback Functions
function newspotrika_customize_partial_blogname() {
	bloginfo( 'name' );
}

function newspotrika_customize_partial_blogdescription() {
	bloginfo( 'description' );
}