<?php 

// Setting Show top Header.
$wp_customize->add_setting( 'control_top_header',
	array(
	'default'           => true,
	'sanitize_callback' => 'newspotrika_sanitize_checkbox'
	)
);

// Setting Footer Widgets.
$wp_customize->add_setting( 'control_footer_widgets',
	array(
	'default'           => true,
	'sanitize_callback' => 'newspotrika_sanitize_checkbox',
	)
);

// Setting Copyright Text.
$wp_customize->add_setting( 'control_footer_text',
	array(
	'sanitize_callback' => 'sanitize_text_field',
	)
);
