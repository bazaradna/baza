<?php 

namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Block
class newspotrika_Widget_Block extends Widget_Base {
 
   public function get_name() {
      return 'cc_block';
   }
 
   public function get_title() {
      return esc_html__( 'Post Block', 'newspotrika' );
   }
 
   public function get_icon() { 
        return 'eicon-posts-group';
   }
 
   public function get_categories() {
      return [ 'newspotrika-elements' ];
   }      

   protected function _register_controls() {
      
      $this->add_control(
         'block_section',
         [
            'label' => esc_html__( 'Block', 'newspotrika' ),
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
         'styles',
         [
            'label' => esc_html__( 'Block Styles', 'newspotrika' ),
            'type' => Controls_Manager::SELECT2,
            'section' => 'block_section',
            'options' => [
               'style_1' => __( 'Style One', 'newspotrika' ),
               'style_2' => __( 'Style Two', 'newspotrika' ),
               'style_3' => __( 'Style Three', 'newspotrika' ),
               'style_4' => __( 'Style Four', 'newspotrika' ),
               'style_5' => __( 'Style Five', 'newspotrika' )
            ],
            'default' => 'style_1',
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

      $this->add_control(
         'excerpt_length',
         [
            'label' => __( 'Excert Length', 'newspotrika' ),
            'section' => 'block_section',
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 15,
         ]
      );

   }
   
 
   protected function render( $instance = [] ) {
 
        // get our input from the widget settings.
       
         $settings = $this->get_settings_for_display();
         
         //Inline Editing
         $this->add_inline_editing_attributes( 'cc_block', 'basic' );
         $title = ! empty( $settings['title'] ) ? $settings['title'] : '';
         $category = ! empty( $settings['category'] ) ? $settings['category'] : '';
         $styles = ! empty( $settings['styles'] ) ? $settings['styles'] : '';
         $posts_per_block = ! empty( $settings['posts_per_block'] ) ? $settings['posts_per_block'] : '';
         $num_title_word = ! empty( $settings['num_title_word'] ) ? $settings['num_title_word'] : '';
         $excerpt_length = ! empty( $settings['excerpt_length'] ) ? $settings['excerpt_length'] : '';

         $block_parent = new \WP_Query(array(
         'post_type'      => 'post',
         'posts_per_page' => 1,
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

         $block_child = new \WP_Query(array(
         'post_type'      => 'post',
         'posts_per_page' => $posts_per_block,
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
         <div class="row block justify-content-center">
            <div class="col-sm-<?php if ( $styles == 'style_1' ){ echo'12'; }elseif( $styles == 'style_2') { echo'12'; } else { echo'12'; }  ?>">
               <?php
               if ( $title ) : ?>
                     <div class="block-title">
                        <p><?php echo esc_html( $title ) ?></p>
                     </div>               
                  <?php endif;

            if ( $styles == 'style_1' ){ echo'</div><div class="col-sm-6">'; }
            elseif ( $styles == 'style_2') { echo'</div><div class="col-sm-12">'; }
            elseif ( $styles == 'style_3') { echo'</div><div class="col-sm-8">'; }
            elseif ( $styles == 'style_5') { echo'</div><div class="col-sm-12" style="display:none">'; }
            else { echo'</div><div class="col-sm-12">'; }  ?>
            
            <?php 
               if ($block_parent->have_posts()):
               while($block_parent->have_posts()) : 
                        $block_parent->the_post(); ?>
                     <div class="block-item">
                        <div class="block-item-thumbnail">
                           <?php newspotrika_thumbnail('full') ?>
                           <ul class="list-inline block-item-meta">
                              <li class="list-inline-item">
                              <?php $block_category = get_the_category();
                              if ( ! empty( $category ) ) {
                              echo '<a class="banner-category" href="' . esc_url( get_category_link( $block_category[0]->term_id ) ) . '"><i class="fa fa-tag"></i>' . esc_html( $block_category[0]->name ) . '</a>';
                              } ?>
                              </li>
                              <li class="list-inline-item">
                                 <i class="fa fa-clock-o"></i><?php the_time(); ?>
                              </li>                              
                           </ul>                           
                        </div>
                     
                        <div class="block-content <?php if ( $styles == 'style_2' ||  $styles == 'style_4' ){ echo'mb_30'; } ?>">
                           <a href="<?php the_permalink() ?>">
                              <?php the_title('<h5>','</h5>') ?>
                           </a>
                           <p><?php echo newspotrika_excerpt($excerpt_length) ?></p>                      
                        </div>
                     </div>
                  <?php 
               endwhile; 
            endif; 
            wp_reset_postdata(); ?>
            </div>
            <div class="col-sm-<?php 
               if ( $styles == 'style_1' ){ 
                  echo'6'; 
               } elseif ( $styles == 'style_2' || $styles == 'style_4' || $styles == 'style_5') { 
                  echo'12'; 
               } elseif ( $styles == 'style_3') {
                  echo'4'; 
               } else {
                  echo'12'; 
               } ?>">

               <?php 

               if ( $styles == 'style_4' || $styles == 'style_5' ) { 
                  echo'<div class="row">'; 
               }

               if ($block_child->have_posts()):
               while($block_child->have_posts()) : 
                        $block_child->the_post(); ?>
               <?php
               if ( $styles == 'style_4' ||  $styles == 'style_5' ) { 
                  echo'<div class="col-sm-6">'; 
               }?>
                     <div class="block-item">
                        <?php 
                        if ( $styles == 'style_3' || $styles == 'style_5' ){ ?>
                        <div class="block-grid-row <?php if ( $styles == 'style_5' ||  $styles == 'style_4' ){ echo'mb_30'; } ?>">
                           <div class="block-grid-image">
                              <?php newspotrika_thumbnail('newspotrika-360x260')?>
                           </div>
                           <div class="block-grid-content">
                              <a href="<?php the_permalink() ?>">
                                 <h6><?php echo esc_html( wp_trim_words( get_the_title(), $num_title_word,' ')); ?></h6>
                              </a>  
                           </div>
                        </div>                        
                        <?php } else { ?>
                        <div class="block-list-row <?php if ( $styles == 'style_4' ){ echo'mb_30'; } ?>">
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
                                      <?php the_time(); ?>
                                 </li> 
                         
                              </ul>
                           </div>
                        </div>
                     <?php } ?>
                  </div>
               <?php if ( $styles == 'style_4' ||  $styles == 'style_5'  ){ 
                  echo'</div>'; 
               }?>
                  <?php 
               endwhile; 
            endif; 
            wp_reset_postdata(); ?>
            </div>
            <?php
            if ( $styles == 'style_4' || $styles == 'style_5' ){ 
                  echo'</div>'; 
            } ?>
         </div>
      <?php

   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new newspotrika_Widget_Block );