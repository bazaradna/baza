<?php
/**
 * About configuration
 *
 * @package newspotrika
 */

$config = array(
	'menu_name' => esc_html__( 'About News Potrika', 'newspotrika' ),
	'page_name' => esc_html__( 'About News Potrika', 'newspotrika' ),

	/* translators: theme version */
	'welcome_title' => sprintf( esc_html__( 'Welcome to News Potrika - v', 'newspotrika' ), 'newspotrika' ),

	/* translators: 1: theme name */
	'welcome_content' => sprintf( esc_html__( 'News Potrikais now installed and ready to use! We want to make sure you have the best experience using News Potrika and that is why we gathered here all the necessary information for you. We hope you will enjoy using News Potrika, as much as we enjoy creating great products.', 'newspotrika' ), 'newspotrika' ),

	// Quick links.
	'quick_links' => array(
		'theme_url' => array(
			'text' => esc_html__( 'Theme Details','newspotrika' ),
			'url'  => 'https://codecorns.com/downloads/newspotrika/',
			),
		'demo_url' => array(
			'text' => esc_html__( 'View Demo','newspotrika' ),
			'url'  => 'http://newspotrika.codecorns.com/',
			),
		'documentation_url' => array(
			'text'   => esc_html__( 'View Documentation','newspotrika' ),
			'url'    => 'https://codecorns.com/docs/news-potrika-wordpress-theme/',
			'button' => 'primary',
			),
		'rate_url' => array(
			'text' => esc_html__( 'Rate This Theme','newspotrika' ),
			'url'  => 'https://wordpress.org/support/theme/newspotrika/reviews/',
			),
		),

	// Tabs.
	'tabs' => array(
		'getting_started'     => esc_html__( 'Getting Started', 'newspotrika' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'newspotrika' ),
		// 'demo_content'        => esc_html__( 'Demo Content', 'newspotrika' ),
		'useful_plugins'      => esc_html__( 'Useful Plugins', 'newspotrika' ),
		'support'             => esc_html__( 'Support', 'newspotrika' ),
		'upgrade_to_pro'      => esc_html__( 'Upgrade to Pro', 'newspotrika' ),
	),

	// Getting started.
	'getting_started' => array(
		array(
			'title'               => esc_html__( 'Theme Documentation', 'newspotrika' ),
			'text'                => esc_html__( 'Even if you are a long-time WordPress user, we still believe you should give our documentation a very quick read.', 'newspotrika' ),
			'button_label'        => esc_html__( 'View Documentation', 'newspotrika' ),
			'button_link'         => 'https://codecorns.com/docs/news-potrika-wordpress-theme/',
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Recommended Actions', 'newspotrika' ),
			'text'                => esc_html__( 'We have compiled a list of steps for you, to take make sure the experience you will have using one of our products is very easy to follow.', 'newspotrika' ),
			'button_label'        => esc_html__( 'Check Recommended Actions', 'newspotrika' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=newspotrika-about&tab=recommended_actions' ) ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),

		array(
			'title'               => esc_html__( 'Customize Everything', 'newspotrika' ),
			'text'                => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'newspotrika' ),
			'button_label'        => esc_html__( 'Go to Customizer', 'newspotrika' ),
			'button_link'         => esc_url( wp_customize_url() ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'View Theme Demo', 'newspotrika' ),
			'text'                => esc_html__( 'To get quick glance of the theme, please visit theme demo.', 'newspotrika' ),
			'button_label'        => esc_html__( 'View Demo', 'newspotrika' ),
			'button_link'         => 'http://newspotrika.codecorns.com/',
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Child Theme', 'newspotrika' ),
			'text'                => esc_html__( 'If you want to customize theme file, you should use child theme rather than modifying theme file itself.', 'newspotrika' ),
			'button_label'        => esc_html__( 'About Child Theme', 'newspotrika' ),
			'button_link'         => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
	),

	// Recommended actions.
	'recommended_actions' => array(
		'content' => array(
			'elementor' => array(
				'title'       => esc_html__( 'Elementor', 'newspotrika' ),
				'description' => esc_html__( 'Please install the Elementor page builder to create page by drag and drop.', 'newspotrika' ),
				'check'       => class_exists( 'Elementor\Plugin' ),
				'plugin_slug' => 'elementor',
				'id'          => 'elementor',
			),

			'one-click-demo-import' => array(
				'title'       => esc_html__( 'One Click Demo Import', 'newspotrika' ),
				'description' => esc_html__( 'This plugin help you to import all dummy data to your website. which is similar to live demo of NewsPotrika Theme', 'newspotrika' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'one-click-demo-import',
				'id'          => 'one-click-demo-import',
			)
		),
	),

	// Useful plugins.
	'useful_plugins' => array(
		'description'        => esc_html__( 'This theme supports some helpful WordPress plugins to enhance your website.', 'newspotrika' ),
		'plugins_list_title' => esc_html__( 'Useful Plugins List:', 'newspotrika' ),
	),

	// Support.
	'support_content' => array(
		'first' => array(
			'title'        => esc_html__( 'Contact Support', 'newspotrika' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'Got theme support question or found bug? Best place to ask your query is our dedicated Support forum.', 'newspotrika' ),
			'button_label' => esc_html__( 'Contact Support', 'newspotrika' ),
			'button_link'  => esc_url( 'https://codecorns.com/contact/' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Theme Documentation', 'newspotrika' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Please check our theme documentation for detailed information on how to setup and use theme.', 'newspotrika' ),
			'button_label' => esc_html__( 'View Documentation', 'newspotrika' ),
			'button_link'  => 'https://codecorns.com/docs/news-potrika-wordpress-theme/',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'third' => array(
			'title'        => esc_html__( 'Pro Version', 'newspotrika' ),
			'icon'         => 'dashicons dashicons-products',
			'icon'         => 'dashicons dashicons-star-filled',
			'text'         => esc_html__( 'Upgrade to pro version for more exciting features and additional theme options.', 'newspotrika' ),
			'button_label' => esc_html__( 'View Pro Version', 'newspotrika' ),
			'button_link'  => 'https://codecorns.com/downloads/newspotrika/',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'fourth' => array(
			'title'        => esc_html__( 'Pre-sale Queries', 'newspotrika' ),
			'icon'         => 'dashicons dashicons-cart',
			'text'         => esc_html__( 'Have any query before purchase, you are more than welcome to ask.', 'newspotrika' ),
			'button_label' => esc_html__( 'Pre-sale question?', 'newspotrika' ),
			'button_link'  => 'https://codecorns.com/pre-sale-question/',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'fifth' => array(
			'title'        => esc_html__( 'Customization Request', 'newspotrika' ),
			'icon'         => 'dashicons dashicons-admin-tools',
			'text'         => esc_html__( 'Needed any customization for the theme, you can request from here.', 'newspotrika' ),
			'button_label' => esc_html__( 'Customization Request', 'newspotrika' ),
			'button_link'  => 'https://codecorns.com/customization-request/',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'sixth' => array(
			'title'        => esc_html__( 'Child Theme', 'newspotrika' ),
			'icon'         => 'dashicons dashicons-admin-customizer',
			'text'         => esc_html__( 'If you want to customize theme file, you should use child theme rather than modifying theme file itself.', 'newspotrika' ),
			'button_label' => esc_html__( 'About Child Theme', 'newspotrika' ),
			'button_link'  => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
	),

	
	// Upgrade.
	'upgrade_to_pro' => array(
		'description'  => '
		<table>
			<tbody>
			<tr>
			<th>Features</th>
			<th>NewsPotrika Free</th>
			<th>NewsPotrika Pro</th>
			</tr>
			<tr>
			<td>Multiple Layouts</td>
			<td><img draggable="false" class="emoji no" alt="✖" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2716.svg"></td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			</tr>
			<tr>
			<td>Theme Options</td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"> (Redux)</td>
			</tr>
			<tr>
			<td>Custom Widgets</td>
			<td><img draggable="false" class="emoji no" alt="✖" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2716.svg"></td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			</tr>
			<tr>
			<td>Colour Changing Options</td>
			<td><img draggable="false" class="emoji no" alt="✖" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2716.svg"></td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			</tr>
			<tr>
			<td>Custom Menu</td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			</tr>
			<tr>
			<td>Footer Widgets</td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			</tr>
			<tr>
			<td>Menu Settings</td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			</tr>
			<tr>
			<td>Logo and title customization</td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			</tr>
			<tr>
			<td>Layout Options</td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"> (Extra)</td>
			</tr>
			<tr>
			<td>Banner Layout</td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"> (1 Layout)</td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"> (5 Layout)</td>
			</tr>
			<tr>
			<td>Related Post</td>
			<td><img draggable="false" class="emoji no" alt="✖" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2716.svg"></td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			</tr>
			<tr>
			<td>Social Share</td>
			<td><img draggable="false" class="emoji no" alt="✖" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2716.svg"></td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			</tr>
			<tr>
			<td>Post Navigation Switch</td>
			<td><img draggable="false" class="emoji no" alt="✖" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2716.svg"></td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			</tr>
			<tr>
			<td>Custom Excerpt Length</td>
			<td><img draggable="false" class="emoji no" alt="✖" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2716.svg"></td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			</tr>
			<tr>
			<td>Preloader</td>
			<td><img draggable="false" class="emoji no" alt="✖" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2716.svg"></td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			</tr>
			<tr>
			<td>Navigation Bar Colour Change</td>
			<td><img draggable="false" class="emoji no" alt="✖" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2716.svg"></td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			</tr>
			<tr>
			<td>Navigation Link Colour Change</td>
			<td><img draggable="false" class="emoji no" alt="✖" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2716.svg"></td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			</tr>
			<tr>
			<td>News Ticker</td>
			<td><img draggable="false" class="emoji no" alt="✖" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2716.svg"></td>
			<td><img draggable="false" class="emoji" alt="✔" src="https://s.w.org/images/core/emoji/12.0.0-1/svg/2714.svg"></td>
			</tr>
			</tbody>
		</table>',
		'button_label' => esc_html__( 'Upgrade to Pro', 'newspotrika' ),
		'button_link'  => 'https://codecorns.com/downloads/newspotrika/',
		'is_new_tab'   => true,
	),

);

newspotrika_About::init( apply_filters( 'newspotrika_about_filter', $config ) );
