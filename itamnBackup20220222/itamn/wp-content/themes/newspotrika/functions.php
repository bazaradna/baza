<?php
/**
 * newspotrika functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package newspotrika
 */

if ( ! function_exists( 'newspotrika_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function newspotrika_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on newspotrika, use a find and replace
		 * to change 'newspotrika' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'newspotrika', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'newspotrika' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'newspotrika_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Add image size
		add_image_size( 'newspotrika-500x360',500,360,true );
		add_image_size( 'newspotrika-218x150',218,150,true );
		add_image_size( 'newspotrika-1280x600',1280,600,true );
		add_image_size( 'newspotrika-360x260',360,260,true );
		add_image_size( 'newspotrika-480x665',480,665,true );
	}
endif;
add_action( 'after_setup_theme', 'newspotrika_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function newspotrika_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'newspotrika_content_width', 640 );
}
add_action( 'after_setup_theme', 'newspotrika_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function newspotrika_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'newspotrika' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'newspotrika' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'newspotrika' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add footer widgets here.', 'newspotrika' ),
		'before_widget' => '<div id="%1$s" class="col-lg-3 col-sm-6 footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Ad', 'newspotrika' ),
		'id'            => 'header_ad',
		'description'   => esc_html__( 'Add Ad widgets here.', 'newspotrika' ),
		'before_widget' => '<div class="ad-banner">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'newspotrika_widgets_init' );

  
/**
 * Register custom fonts.
 */
 if ( !function_exists( 'newspotrika_fonts_url' ) ) :
function newspotrika_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'newspotrika' ) ) {
		$fonts[] = 'Open Sans:300,400,500,600,700,800';
	}

	/* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'newspotrika' ) ) {
		$fonts[] = 'Roboto:300,400,500,700,900';
	}
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function newspotrika_scripts() {
	// CSS
	wp_enqueue_style('newspotrika-google-font', newspotrika_fonts_url() );
	wp_enqueue_style('bootstrap',get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('newspotrika-color',get_template_directory_uri() . '/assets/css/color/default.min.css');
	wp_enqueue_style('meanmenu',get_template_directory_uri() . '/assets/css/meanmenu.min.css');
	wp_enqueue_style('slick',get_template_directory_uri() . '/assets/css/slick.min.css');
	wp_enqueue_style('slick-theme',get_template_directory_uri() . '/assets/css/slick-theme.min.css');
	wp_enqueue_style('fontawesome',get_template_directory_uri() . '/assets/css/font-awesome.min.css');
	wp_enqueue_style('newspotrika-theme',get_template_directory_uri() . '/assets/css/theme.min.css');
	wp_enqueue_style( 'newspotrika-style', get_stylesheet_uri() );


	// JS
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.0.0', true );
	wp_enqueue_script( 'meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.min.js', array('jquery'), '4.0.0', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.1.2', true );
	wp_enqueue_script( 'newspotrika-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'newspotrika-main', get_template_directory_uri() . '/assets/js/main.min.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'newspotrika_scripts' );



function newspotrika_admin_scripts() {
  echo '
  <style>
    .upgrade-to-pro table td,
    .upgrade-to-pro table th {
		border: 1px solid #dee2e6;
		padding: 10px 15px;
		text-align: left;
    }
    .upgrade-to-pro table .emoji {
    	border: 2px solid green!important;
    }
    .upgrade-to-pro table .emoji.no {
    	border: 2px solid red!important;
    }
    .upgrade-to-pro table tr th:nth-child(1){
    	background: #0085ba;
    	color:white;
    }
    .upgrade-to-pro table tr th:nth-child(2){
    	background: red;
    	color:white;
    }
    .upgrade-to-pro table tr th:nth-child(3){
    	background: green;
    	color:white;
    }
  </style>';
}
add_action('admin_head', 'newspotrika_admin_scripts');
/**
 * Customizer preview JS.
 */
function newspotrika_customize_preview_js() {
	wp_enqueue_script( 'newspotrika-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'newspotrika_customize_preview_js' );

// Include files
require get_template_directory() . '/inc/breadcrumbs.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer/customizer.php';
if ( !is_plugin_active( 'newspotrika-pro/newspotrika-pro.php' ) ) {
	require get_template_directory() . '/inc/upsale/class-upsale.php';
}
/**
 * Check if Elementor is active
 **/
if ( class_exists( 'Elementor\Plugin' ) ) {
    require get_template_directory() . '/inc/elementor/elementor.php';
}

/**
 * Load theme about page
 */
require get_template_directory(). '/inc/about/class-about.php';
require get_template_directory(). '/inc/about/about.php';

function themeblvd_time_ago() {
 
    global $post;
 
    $date = get_post_time('G', true, $post);
 
    /**
     * Where you see 'themeblvd' below, you'd
     * want to replace those with whatever term
     * you're using in your theme to provide
     * support for localization.
     */ 
 
    // Array of time period chunks
    $chunks = array(
        array( 60 * 60 * 24 * 365 , __( 'жилийн', 'themeblvd' ), __( 'жилийн', 'themeblvd' ) ),
        array( 60 * 60 * 24 * 30 , __( 'сарын', 'themeblvd' ), __( 'сарын', 'themeblvd' ) ),
        array( 60 * 60 * 24 * 7, __( '7 хоногийн', 'themeblvd' ), __( '7 хоногийн', 'themeblvd' ) ),
        array( 60 * 60 * 24 , __( 'өдрийн', 'themeblvd' ), __( 'өдрийн', 'themeblvd' ) ),
        array( 60 * 60 , __( 'цагийн', 'themeblvd' ), __( 'цагийн', 'themeblvd' ) ),
        array( 60 , __( 'минутын', 'themeblvd' ), __( 'минутын', 'themeblvd' ) ),
        array( 1, __( 'секундын', 'themeblvd' ), __( 'секундын', 'themeblvd' ) )
    );
 
    if ( !is_numeric( $date ) ) {
        $time_chunks = explode( ':', str_replace( ' ', ':', $date ) );
        $date_chunks = explode( '-', str_replace( ' ', '-', $date ) );
        $date = gmmktime( (int)$time_chunks[1], (int)$time_chunks[2], (int)$time_chunks[3], (int)$date_chunks[1], (int)$date_chunks[2], (int)$date_chunks[0] );
    }
 
    $current_time = current_time( 'mysql', $gmt = 8 );
    $newer_date = strtotime( $current_time );
 
    // Difference in seconds
    $since = $newer_date - $date;
 
    // Something went wrong with date calculation and we ended up with a negative date.
    if ( 0 > $since )
        return __( 'sometime', 'themeblvd' );
 
    /**
     * We only want to output one chunks of time here, eg:
     * x years
     * xx months
     * so there's only one bit of calculation below:
     */
 
    //Step one: the first chunk
    for ( $i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
 
        // Finding the biggest chunk (if the chunk fits, break)
        if ( ( $count = floor($since / $seconds) ) != 0 )
            break;
    }
 
    // Set output var
    $output = ( 1 == $count ) ? '1 '. $chunks[$i][1] : $count . ' ' . $chunks[$i][2];
 
 
    if ( !(int)trim($output) ){
        $output = '0 ' . __( 'секундын', 'themeblvd' );
    }
 
    $output .= __(' өмнө', 'themeblvd');
 
    return $output;
}
 
// Filter our themeblvd_time_ago() function into WP's the_time() function
add_filter('the_time', 'themeblvd_time_ago');

add_filter('comment_flood_filter', '__return_false'); /*comment iin*/


function time_ago( $type = 'post' ) {
    $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';

    return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');

}