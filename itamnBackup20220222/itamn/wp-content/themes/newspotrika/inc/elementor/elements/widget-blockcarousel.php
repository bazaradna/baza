<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Block Carousel
class newspotrika_Widget_Block_Carousel extends Widget_Base {
 
   public function get_name() {
      return 'cc_block_carousel';
   }
 
   public function get_title() {
      return esc_html__( 'Post Block Carousel', 'newspotrika' );
   }
 
   public function get_icon() { 
        return 'eicon-posts-carousel';
   }
 
   public function get_categories() {
      return [ 'newspotrika-elements' ];
   }      

   protected function _register_controls() {
      
      $this->add_control(
         'block_section',
         [
            'label' => esc_html__( 'Block Carousel', 'newspotrika' ),
            'type' => Controls_Manager::SECTION,
         ]
      );


      $this->add_control(
         'category',
         [
            'label' => esc_html__( 'Category', 'newspotrika' ),
            'type' => Controls_Manager::SELECT2, 
            'title' => esc_html__( 'Select a category', 'newspotrika' ),
            'section' => 'block_section',
            'options' => newspotrika_get_terms_dropdown_array([
               'taxonomy' => 'category',
               'hide_empty' => false,
            ]),
         ]
      );

      $this->add_control(
         'posts_per_block',
         [
            'label' => esc_html__( 'Post Per Block', 'newspotrika' ),
            'type' => Controls_Manager::NUMBER,
            'default' => '',
            'section' => 'block_section',
            'default' => 4,
         ]
      );

      $this->add_control(
         'num_title_word',
         [
            'label' => __( 'Title Word Length', 'newspotrika' ),
            'section' => 'block_section',
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 8,
         ]
      );


   }
   
 
   protected function render( $instance = [] ) {
 
        // get our input from the widget settings.
       
         $settings = $this->get_settings_for_display();
         
         //Inline Editing
         $this->add_inline_editing_attributes( 'cc_block_carousel', 'basic' );
         $category = ! empty( $settings['category'] ) ? $settings['category'] : '';
         $posts_per_block = ! empty( $settings['posts_per_block'] ) ? $settings['posts_per_block'] : '';
         $num_title_word = ! empty( $settings['num_title_word'] ) ? $settings['num_title_word'] : '';

         $block_parent = new \WP_Query(array(
         'post_type'      => 'post',
         'posts_per_page' => $posts_per_block,
         'order'        => 'ASC',
         'category__in'  => $category,
         'ignore_sticky_posts' => true,
         'tax_query' => array(
               array(
                  'taxonomy' => 'post_format',
                  'field' => 'slug',
                  'terms' => array('post-format-aside', 'post-format-gallery', 'post-format-link', 'post-format-image', 'post-format-quote', 'post-format-status', 'post-format-audio', 'post-format-chat', 'post-format-video'),
                  'operator' => 'NOT IN'
               )
            )
         ));
         ?>
         <div class="row block-carousel justify-content-center">
         <?php 
            if ($block_parent->have_posts()):
            while($block_parent->have_posts()) : 
                     $block_parent->the_post(); ?>
               <div class="col-sm-3">
                  <div class="block-carousel-item">
                     <?php newspotrika_thumbnail('newspotrika-480x665') ?>
                     <div class="block-carousel-content">
                        <a href="<?php the_permalink() ?>">
                           <h6><?php echo esc_html( wp_trim_words( get_the_title(), $num_title_word,' ')); ?></h6>
                        </a>      
                        <ul class="list-inline block-carousel-meta">
                           <li class="list-inline-item">
                              <i class="fa fa-clock-o"></i><?php the_time(); ?>
                           </li> 
                        <!--   <li class="list-inline-item">
                              <a href="<?php comments_link(); ?>"><i class="fa fa-comment-o"></i><?php echo esc_html(get_comments_number()) ?></a>
                           </li>-->
                        </ul>              
                     </div>
                  </div>
               </div>
               <?php 
            endwhile; 
         endif; 
         wp_reset_postdata(); ?>
         </div>
      <?php

   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new newspotrika_Widget_Block_Carousel );