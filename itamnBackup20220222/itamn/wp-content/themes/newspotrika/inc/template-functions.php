<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package newspotrika
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function newspotrika_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'newspotrika_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function newspotrika_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'newspotrika_pingback_header' );


// Excerpt More
function newspotrika_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'newspotrika_excerpt_more');

// Excerpt Length
function newspotrika_excerpt_length( $length ) {
  global $newspotrika_opt;
  
  if(isset($newspotrika_opt['newspotrika_excerpt_length'])){
    return esc_html( $newspotrika_opt['newspotrika_excerpt_length'] );
  }
  return 50;
}
add_filter( 'excerpt_length', 'newspotrika_excerpt_length', 999 );

// get posts dropdown
function newspotrika_get_posts_dropdown_array($args = [], $key = 'ID', $value = 'post_title') {
  $options = [];
  $posts = get_posts($args);
  foreach ((array) $posts as $term) {
    $options[$term->{$key}] = $term->{$value};
  }
  return $options;
}

// get terms dropdown
function newspotrika_get_terms_dropdown_array($args = [], $key = 'term_id', $value = 'name') {
  $options = [];
  $terms = get_terms($args);

  if (is_wp_error($terms)) {
    return [];
  }

  foreach ((array) $terms as $term) {
    $options[$term->{$key}] = $term->{$value};
  }

  return $options;
}

//custom excerpt length
function newspotrika_excerpt($limit) {

  $excerpt = explode(' ', get_the_excerpt(), $limit);

  if (count($excerpt)>=$limit) {

    array_pop($excerpt);

    $excerpt = implode(" ",$excerpt).'...';

  } else {

    $excerpt = implode(" ",$excerpt);

  }

  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);

  return $excerpt;
}


// newspotrika Thumbnail
function newspotrika_thumbnail($size) {
  if (has_post_thumbnail()) { ?>
    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail($size) ?></a>
  <?php } else { ?>
    <a href="<?php the_permalink() ?>">
      <img class="img-fluid" src="<?php echo esc_url( get_template_directory_uri().'/assets/images/placeholder.png' ); ?>" alt="<?php the_title_attribute() ?>">
    </a>
    
  <?php }
  
}




//newspotrika Comments List
function newspotrika_comments_list($comment, $args, $depth){
  $avatar = get_avatar( $comment, 95, null , null , array('class' => array('img-responsive', 'img-circle') ) );
  ?>

    <?php if (is_page()): ?>
    <div class="container">
      <div class="row">
        <?php if( $avatar !== false ) {?>

      <?php } ?>
          
          <div class="col-sm-<?php if ( $avatar !== false ) { echo "10"; } else { echo "12"; } ?> col-xs-<?php if ( $avatar !== false ) { echo "9"; } else { echo "12"; } ?>">
            <div class="commenter" style="font-size:12px;">
                <?php echo get_comment_author_link(); ?> &emsp;
                <?php   echo esc_html( get_comment_author_IP( $comment_ID ) );?>&emsp;
                <?php echo get_comment_date(); ?> өдөр <?php echo get_comment_time(); ?>
              </div>
                <span style="font-size:16px; color:#000;"> <?php comment_text(); ?></span>

              <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>  
          </div>
      </div>
  </div>

    <?php else: ?>

    <div class="container">
    <div class="row">
        <?php if( $avatar !== false ) {?>

      <?php } ?>
          
          <div class="col-sm-<?php if ( $avatar !== false ) { echo "10"; } else { echo "12"; } ?> col-xs-<?php if ( $avatar !== false ) { echo "9"; } else { echo "12"; } ?>">
            <div class="commenter" style="font-size:12px;">
               <?php echo get_comment_author_link(); ?> &emsp;
            <?php   echo esc_html( get_comment_author_IP( $comment_ID ) );?>&emsp;
                <?php echo get_comment_date(); ?> өдөр <?php echo get_comment_time(); ?>
              </div>
          
             <span style="font-size:16px; color:#000;"> <?php comment_text(); ?></span>

              <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
          </div>
      </div>
  </div>

    <?php endif ?>
  
<?php 
}


//Comment Field to Bottom
function newspotrika_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'newspotrika_comment_field_to_bottom' );


// newspotrika entry footer
if ( ! function_exists( 'newspotrika_entry_footer' ) ) :
  /**
   * Prints HTML with meta information for the categories, tags and comments.
   */
  function newspotrika_entry_footer() {
    // Hide category and tag text for pages.
    if ( 'post' === get_post_type() ) {
      /* translators: used between list items, there is a space after the comma */
      $categories_list = get_the_category_list( esc_html__( ', ', 'newspotrika' ) );
      if ( $categories_list ) {
        /* translators: 1: list of categories. */
        printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'newspotrika' ) . '</span>', $categories_list ); // WPCS: XSS OK.

      }

      /* translators: used between list items, there is a space after the comma */
      $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'newspotrika' ) );
      if ( $tags_list ) {
        /* translators: 1: list of tags. */
        printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'newspotrika' ) . '</span>', $tags_list ); // WPCS: XSS OK.
      }
    }

    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
      echo '<span class="comments-link">';
      comments_popup_link(
        sprintf(
          wp_kses(
            /* translators: %s: post title */
            __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'newspotrika' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          get_the_title()
        )
      );
      echo '</span>';
    }

    edit_post_link(
      sprintf(
        wp_kses(
          /* translators: %s: Name of current post. Only visible to screen readers */
          __( 'Edit <span class="screen-reader-text">%s</span>', 'newspotrika' ),
          array(
            'span' => array(
              'class' => array(),
            ),
          )
        ),
        get_the_title()
      ),
      '<span class="edit-link">',
      '</span>'
    );
  }
endif;

// Archive count on rightside
function newspotrika_archive_count_on_rightside($links) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="pull-right">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}

add_filter('get_archives_link', 'newspotrika_archive_count_on_rightside');

// Category count on rightside
function newspotrika_category_count_on_rightside($links) {
  $links = str_replace('</a> (', '</a> <span class="pull-right">(', $links);
  $links = str_replace(')', ')</span>', $links);
  return $links;
}
add_filter('wp_list_categories', 'newspotrika_category_count_on_rightside');


/**
 * Set up the WordPress core custom header feature.
 *
 * @uses newspotrika_header_style()
 */
function newspotrika_custom_header_setup() {
  add_theme_support( 'custom-header', apply_filters( 'newspotrika_custom_header_args', array(
    'default-image'          => '',
    'default-text-color'     => '000000',
    'width'                  => 1000,
    'height'                 => 250,
    'flex-height'            => true,
    'wp-head-callback'       => 'newspotrika_header_style',
  ) ) );
}
add_action( 'after_setup_theme', 'newspotrika_custom_header_setup' );

if ( ! function_exists( 'newspotrika_header_style' ) ) :
  /**
   * Styles the header image and text displayed on the blog.
   *
   * @see newspotrika_custom_header_setup().
   */
  function newspotrika_header_style() {
    $header_text_color = get_header_textcolor();

    /*
     * If no custom options for text are set, let's bail.
     * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
     */
    if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
      return;
    }

    // If we get this far, we have custom styles. Let's do this.
    ?>
    <style type="text/css">
    <?php
    // Has the text been hidden?
    if ( ! display_header_text() ) :
      ?>
      .navbar-brand,
      .ssite-desc {
        position: absolute;
        clip: rect(1px, 1px, 1px, 1px);
      }
    <?php
    // If the user has set a custom color for the text use that.
    else :
      ?>
      .navbar-brand,
      .site-desc {
        color: #<?php echo esc_attr( $header_text_color ); ?>;
      }
    <?php endif; ?>
    </style>
    <?php
  }
endif;

// Demo import
function newspotrika_import_files( $demos ) {
  global $demos;
  return $demos;
}
add_filter( 'pt-ocdi/import_files', 'newspotrika_import_files' );

$demos = array(
    array(      
      'import_file_name'             => 'Demo Deafult',
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/widgets.wie',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/customizer.dat',
      'import_preview_image_url'     => get_template_directory_uri().'/screenshot.jpg',
      'preview_url'                  => 'http://newspotrika.codecorns.com/',
    ),
);

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'newspotrika-pro/newspotrika-pro.php' ) ) {
  array_push($demos, 
    array(
      'import_file_name'             => 'Demo Pro 1',
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/1/content.xml',
      'local_import_redux'           => array(
        array(
          'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/1/redux.json',
          'option_name' => 'newspotrika_opt',
        ),
      ),
      'import_preview_image_url'     => plugins_url('newspotrika-pro/assets/images/demo-1.jpg'),
      'preview_url'                  => 'http://newspotrika.codecorns.com/home-1',
    ),

    array(      
      'import_file_name'             => 'Demo Pro 2',
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/2/content.xml',
      'local_import_redux'           => array(
        array(
          'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/2/redux.json',
          'option_name' => 'newspotrika_opt',
        )
      ),
      'import_preview_image_url'     => plugins_url('newspotrika-pro/assets/images/demo-2.jpg'),
      'preview_url'                  => 'http://newspotrika.codecorns.com/home-2',
    ),

    array(      
      'import_file_name'             => 'Demo Pro 3',
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/3/content.xml',
      'local_import_redux'           => array(
        array(
          'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/3/redux.json',
          'option_name' => 'newspotrika_opt',
        )
      ),
      'import_preview_image_url'     => plugins_url('newspotrika-pro/assets/images/demo-3.jpg'),
      'preview_url'                  => 'http://newspotrika.codecorns.com/home-3',
    ),
    
    array(
      'import_file_name'             => 'Demo Pro 4',
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/4/content.xml',
      'local_import_redux'           => array(
        array(
          'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/4/redux.json',
          'option_name' => 'newspotrika_opt',
        )
      ),
      'import_preview_image_url'     => plugins_url('newspotrika-pro/assets/images/demo-4.jpg'),
      'preview_url'                  => 'http://newspotrika.codecorns.com/home-4',
    )
  );
} 


// Default Home and Blog Setup
function newspotrika_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Primary', 'primary' );

    set_theme_mod( 'nav_menu_locations', array(
            'main_menu' => $main_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'newspotrika_after_import_setup' );