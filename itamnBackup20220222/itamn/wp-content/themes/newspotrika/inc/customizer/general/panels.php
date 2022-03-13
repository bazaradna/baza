<?php 

// Add theme options panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => __( 'Theme Options', 'newspotrika' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);