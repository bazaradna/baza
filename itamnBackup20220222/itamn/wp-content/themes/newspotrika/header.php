<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newspotrika
 */
global $newspotrika_opt;

$newspotrika_header_full_width = !empty( $newspotrika_opt['newspotrika_header_full_width'] ) ? $newspotrika_opt['newspotrika_header_full_width'] : '';
$blog_breadcrumb = isset( $newspotrika_opt['blog_breadcrumb'] ) ? $newspotrika_opt['blog_breadcrumb'] : true;
$blog_breadcrumb_banner = isset( $newspotrika_opt['blog_breadcrumb_banner'] ) ? $newspotrika_opt['blog_breadcrumb_banner'] : true;
$control_top_header = get_theme_mod( 'control_top_header', true );
$newspotrika_display_ad_on_top = get_theme_mod( 'newspotrika_display_ad_on_top', true );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords"
              content="Технологи, инженер, Монгол, Улс, Монгол улс, УИХ, Гишүүд, хөгжил, ирээдүй, залуус, бизнес, хөгжил, дизайн, шүүмж, хандлага, өнөөдөр, зурхай, хичээл, онлайн, тоглоом, кино, заавар, хичээл, яаж"/>
    <meta name="creator" content="Ardon LLC (ita.mn)"/>
    <meta name="publisher" content="ITA Инженерийн технологи (ita.mn)"/>
    <meta name="robots" content="index, follow"/>
    <meta name="google-site-verification" content="kIfA1SeXFpFXp3Y-MdYeieA5KiJaTXJ3KFmwUxleCSw" />
    <meta name="author" content="ita.mn"/>
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M9BRMC2');</script>
<!-- End Google Tag Manager -->
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123961659-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-123961659-2');
</script>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'newspotrika' ); ?></a>

	<header>
		<div class="site-header">
			<div class="container">
				<div class="row">
					<?php if ($control_top_header == true): ?>
					<div class="col-sm-4">
						<div class="site-branding">
							<?php
							if( has_custom_logo() ){
									the_custom_logo();
							} else { ?>
								<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'title' ) ?></a>
								<p class="site-desc"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
								<?php
							}  ?>
						</div><!-- .site-branding -->
					</div>

					<?php if ($newspotrika_display_ad_on_top == true) {?>
					<div class="col-sm-8">
						<?php 
						if (is_active_sidebar('header_ad')) {
							dynamic_sidebar('header_ad');
						} ?>		
					</div>
					<?php } ?>	

					<?php endif ?>									

					<div class="col-sm-12">
						<div class="mobile_menu"></div>
					</div>
				</div>
			</div>
		</div>

		<nav class="navbar" role="navigation">
			<div class="container<?php if ( true==$newspotrika_header_full_width ){ echo'-fluid'; }?>">
			    <div class="row newspotrika_navbar">
					<?php
					wp_nav_menu( array(
						'theme_location'    => 'primary',
						'depth'             => 2,
						'container'         => 'ul'
					) );
					?>
				</div>
			</div>
		</nav>
	</header><!-- #masthead -->



	<?php 
	if ( true == $blog_breadcrumb_banner ) {
		if (!is_page_template( 'home-page.php')) { 
			// header bg image
			function newspotrika_header_bg_image() {
			  if (has_header_image()) { ?>
			    style="background-image: url( '<?php header_image(); ?>');"
			    <?php } else {
			    echo " ";
			  }
			} ?>
	     <!-- START BREADCRUMB AREA -->
		<section class="breadcrumb-banner <?php if( has_header_image() ){ echo 'breadcrumb-bnr-shadow';} ?>" <?php newspotrika_header_bg_image() ?>>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="breadcrumb-title">
							<h1>
							<?php
							if(is_home() && is_front_page()){
							$breadcrumb_title = !empty($newspotrika_opt['blog_breadcrumb_title']) ? $newspotrika_opt['blog_breadcrumb_title'] : esc_html__( 'Latest Posts', 'newspotrika' );
							}else if(is_home()){
							$breadcrumb_title = !empty($newspotrika_opt['blog_breadcrumb_title']) ? $newspotrika_opt['blog_breadcrumb_title'] : wp_title('', false);
							}else{
							$breadcrumb_title = wp_title('', false);
							}
							echo esc_html($breadcrumb_title);
							?>
							</h1>
							<?php if ( true == $blog_breadcrumb ) { ?>
							<div class="breadcrumbs">
								<?php if ( function_exists( 'newspotrika_breadcrumb' ) ) newspotrika_breadcrumb(); ?>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	    <!--END BREADCRUMB AREA-->
	<?php }
	} ?>
		
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9BRMC2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<div id="content" class="site-content">
