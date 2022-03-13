<?php 

namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Popular Posts
class newspotrika_Widget_Popular_Posts extends Widget_Base {
 
   public function get_name() {
      return 'cc_popular_posts';
   }
 
   public function get_title() {
      return esc_html__( 'Popular Posts', 'newspotrika' );
   }
 
   public function get_icon() { 
        return 'eicon-archive-title';
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
         'title',
         [
            'label' => esc_html__( 'Title', 'newspotrika' ),
            'type' => Controls_Manager::TEXT,
            'default' => '',
            'section' => 'block_section',
         ]
      );
        
      $this->add_control(
         'posts_per_block',
         [
            'label' => esc_html__( 'Post Per Block', 'newspotrika' ),
            'type' => Controls_Manager::NUMBER,
            'default' => '',
            'section' => 'block_section',
            'default' => 5,
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
         $this->add_inline_editing_attributes( 'cc_popular_posts', 'basic' );
         $title = ! empty( $settings['title'] ) ? $settings['title'] : '';
         $posts_per_block = ! empty( $settings['posts_per_block'] ) ? $settings['posts_per_block'] : '';
         $num_title_word = ! empty( $settings['num_title_word'] ) ? $settings['num_title_word'] : ''; 
         ?>


         <div class="popular_posts">
            <?php
            if ( $title ) : ?>
               <div class="block-title">
                  <p><?php echo esc_html( $title ) ?></p>
               </div>               
            <?php endif;?>
             <?php

             $popular_post = new \WP_Query(array(
                 'posts_per_page' => $posts_per_block,
                 'meta_key'=>'popular_posts',
                 'orderby'=>'meta_value_num',
                 'order'=>'DESC',
                 'ignore_sticky_posts' => true
             ));

             while($popular_post->have_posts()) : $popular_post->the_post();  ?>

               <div class="block-item">
                  <div class="block-list-row">
                     <div class="block-list-image">
                        <?php newspotrika_thumbnail('newspotrika-218x150')?>
                     </div>
                     <div class="block-list-content">
                        <a href="<?php the_permalink() ?>">
                           <h6>
                              <?php echo esc_html( wp_trim_words( get_the_title(), $num_title_word,' ')); ?>
                           </h6>                                 
                        </a>  
                        <ul class="list-inline block-item-list-meta">
                           <li class="list-inline-item">
                              <i class="fa fa-clock-o"></i><?php the_time(); ?>
                           </li> 
                           <li class="list-inline-item">
                              <a href="<?php comments_link(); ?>"><i class="fa fa-comment-o"></i><?php echo esc_html(get_comments_number()) ?></a>
                           </li> 
                        </ul>
                     </div>
                  </div>
               </div>

             <?php endwhile;
            wp_reset_postdata(); ?>
      </div> <!-- end popular_posts -->
   <?php

   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new newspotrika_Widget_Popular_Posts );