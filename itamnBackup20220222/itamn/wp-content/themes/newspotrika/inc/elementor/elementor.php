<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function newspotrika_add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'newspotrika-elements',
		[
			'title' => esc_html__( 'newspotrika Elements', 'newspotrika' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'newspotrika_add_elementor_widget_categories' );


//Elementor init
class newspotrika_ElementorCustomElement {
 
   private static $instance = null;
 
   public static function get_instance() {
      if ( ! self::$instance )
         self::$instance = new self;
      return self::$instance;
   }
 
   public function init(){
      add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );
   }


   public function widgets_registered() {

    // We check if the Elementor plugin has been installed / activated.
    if(defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')){
         get_template_part('inc/elementor/elements/widget', 'banner');
         get_template_part('inc/elementor/elements/widget', 'block');
         get_template_part('inc/elementor/elements/widget', 'blockcarousel');
         get_template_part('inc/elementor/elements/widget', 'blockhorizontal');
         get_template_part('inc/elementor/elements/widget', 'contentblock');
         get_template_part('inc/elementor/elements/widget', 'popularposts');
      }
	}

}
 
newspotrika_ElementorCustomElement::get_instance()->init();