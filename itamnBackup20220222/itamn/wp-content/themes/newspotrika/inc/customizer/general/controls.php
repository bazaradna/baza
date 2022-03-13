<?php 

// Show top Header
$wp_customize->add_control( 'control_top_header',
	array(
	'label'    => __( 'Show top Header', 'newspotrika' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

//Footer Widgets
$wp_customize->add_control( 'control_footer_widgets',
	array(
	'label'    => __( 'Enable Footer Widgets', 'newspotrika' ),
	'section'  => 'section_footer',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

//Control Footer Text
$wp_customize->add_control( 'control_footer_text',
	array(
	'label'    => __( 'Copyright Text', 'newspotrika' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);