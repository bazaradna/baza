<?php 

namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Banner
class newspotrika_Widget_Banner_Block extends Widget_Base {
 
   public function get_name() {
      return 'banner';
   }
 
   public function get_title() {
      return esc_html__( 'Banner', 'newspotrika' );
   }
 
   public function get_icon() { 
        return 'eicon-posts-justified';
   }
 
   public function get_categories() {
      return [ 'newspotrika-elements' ];
   }      

   protected function _register_controls() {
      
      $this->add_control(
         'banner_section',
         [
            'label' => esc_html__( 'Banner', 'newspotrika' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'order',
         [
            'label' => esc_html__( 'Order', 'newspotrika' ),
            'type' => Controls_Manager::SELECT2,
            'default' => '',
            'title' => __( 'Order', 'newspotrika' ),
            'section' => 'banner_section',
            'options' => [
               'DESC'  => __( 'Descending', 'newspotrika' ),
               'ASC' => __( 'Ascending', 'newspotrika' )
            ],
         ]
      );

      $this->add_control(
         'slide_count',
         [
            'label' => __( 'Slide Count', 'newspotrika' ),
            'section' => 'banner_section',
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 3,
         ]
      );

   }
   
 
   protected function render( $instance = [] ) {
 
        // get our input from the widget settings.
       
         $settings = $this->get_settings_for_display();
         
         //Inline Editing
         $this->add_inline_editing_attributes( 'banner', 'basic' );
         $order = ! empty( $settings['order'] ) ? $settings['order'] : '';
         $slide_count = ! empty( $settings['slide_count'] ) ? $settings['slide_count'] : '';
         ?>
         <div class="container">
            <div class="banner row justify-content-center">
         <?php 
         $banner = new \WP_Query(array(
         'post_type'      => 'post',
         'posts_per_page' => $slide_count,
         'order'        => $order,
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

         if ($banner->have_posts()):
               while($banner->have_posts()) : 
                        $banner->the_post(); ?>
                     <div class="col-sm-3">
                        <div class="banner-item" style="background-image: url('<?php the_post_thumbnail_url('newspotrika-1280x600') ?>');">
                           <div class="banner-overlay">                              
                              <div class="banner-content">
                                 <span>
                                    <?php $banner_category = get_the_category();
                                    if ( ! empty( $banner_category ) ) {
                                       echo '<a class="banner-category" href="' . esc_url( get_category_link( $banner_category[0]->term_id ) ) . '">' . esc_html( $banner_category[0]->name ) . '</a>';
                                    } ?>  
                                 </span>
                                 <div class="banner-title">
                                    <a href="<?php the_permalink() ?>"><?php the_title('<h6>','</h6>') ?></a>
                                 </div>
                                <div style="font-size: 10px;"> 
                                 <?php the_time(); ?> 
                              </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  <?php 
               endwhile; 
            endif; 
         wp_reset_postdata(); ?>

         </div>
      </div>
   <?php

   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new newspotrika_Widget_Banner_Block );