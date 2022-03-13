<?php

// upsale customize register
function newspotrika_upsale_customize_register( $wp_customize ) {

	class NewsPotrika_UpSale_Section extends WP_Customize_Section {

	public $type = 'pro';

	public $pro_text = '';

	public $pro_url = '';

	public function json() {
		$json = parent::json();

		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url( $this->pro_url );

		return $json;
	}

	protected function render_template() { ?>

		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				{{ data.title }}

				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
	}

	// Upsell section.
	$wp_customize->register_section_type( 'NewsPotrika_UpSale_Section' );
	$wp_customize->add_section(
		new NewsPotrika_UpSale_Section( $wp_customize, 'custom_theme_upsell',
			array(
				'title'    => esc_html__( 'NewsPotrika Pro', 'newspotrika' ),
				'pro_text' => esc_html__( 'Buy Pro', 'newspotrika' ),
				'pro_url'  => 'https://codecorns.com/downloads/newspotrika/',
				'priority' => 1,
			)
		)
	);

}
add_action( 'customize_register', 'newspotrika_upsale_customize_register' );


// Upsale Scripts
function newspotrika_upsale_scripts() {

	wp_enqueue_script( 'upsale-customize-control',get_template_directory_uri() . '/inc/upsale/upsale.js', array( 'customize-controls' ) );

	wp_enqueue_style( 'upsale-customize-control', get_template_directory_uri(). '/inc/upsale/upsale.css' );
}

add_action( 'customize_controls_enqueue_scripts', 'newspotrika_upsale_scripts' );