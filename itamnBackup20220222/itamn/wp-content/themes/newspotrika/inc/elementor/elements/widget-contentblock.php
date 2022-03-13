<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Content Block
class newspotrika_Widget_Content_Block extends Widget_Base {
 
   public function get_name() {
      return 'content-block';
   }
 
   public function get_title() {
      return esc_html__( 'Content Block', 'newspotrika' );
   }
 
   public function get_icon() { 
        return 'fa fa-th';
   }
 
   public function get_categories() {
      return [ 'newspotrika-elements' ];
   }

   protected function _register_controls() {

      $this->add_control(
         'content_block',
         [
            'label' => esc_html__( 'Content Block', 'newspotrika' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
 
 
      $this->add_control(
         'title',
         [
            'label' => esc_html__( 'Title', 'newspotrika' ),
            'type' => Controls_Manager::TEXT,
            'default' => 'Lorem',
            'title' => esc_html__( 'Enter some text', 'newspotrika' ),
            'section' => 'content_block',
         ]
      );
      $this->add_control(
         'content',
         [
            'label' => esc_html__( 'Content', 'newspotrika' ),
            'type' => Controls_Manager::TEXTAREA,
            'default' => 'Ipsum',
            'title' => esc_html__( 'Enter some content', 'newspotrika' ),
            'section' => 'content_block',
         ]
      );
      $this->add_control(
         'btn_text',
         [
            'label' => esc_html__( 'Button Text', 'newspotrika' ),
            'type' => Controls_Manager::TEXT,
            'default' => '',
            'title' => __( 'Enter readmore text', 'newspotrika' ),
            'section' => 'content_block',
         ]
      );
      $this->add_control(
         'btn_url',
         [
            'label' => esc_html__( 'Button URL', 'newspotrika' ),
            'type' => Controls_Manager::TEXT,
            'default' => '',
            'title' => esc_html__( 'Enter readmore URL', 'newspotrika' ),
            'section' => 'content_block',
         ]
      );
 
   }
 
   protected function render( $instance = [] ) {
 
        // get our input from the widget settings.
       
         $settings = $this->get_settings_for_display();
         
         //Inline Editing
         $this->add_inline_editing_attributes( 'content', 'basic' );

         $title = ! empty( $settings['title'] ) ? $settings['title'] : '';
         $content = ! empty( $settings['content'] ) ? $settings['content'] : '';
         $btn_text = ! empty( $settings['btn_text'] ) ? $settings['btn_text'] : '';
         $btn_url = ! empty( $settings['btn_url'] ) ? $settings['btn_url'] : '';

         ?>
       
          
         <div class="content_block">
            <h1><?php echo esc_html($title); ?></h1>
            <p <?php echo $this->get_render_attribute_string( 'content' ) ?>>
               <?php echo esc_html($content); ?>
            </p>
            <?php if ( $btn_text && $btn_url ): ?>
               <a href="<?php echo esc_url($btn_url); ?>"><?php echo esc_html($btn_text); ?><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
               </a>
            <?php endif ?>
            
         </div>
          
         <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new newspotrika_Widget_Content_Block );