<?php
/**
 * The template for displaying custom pages
 * Template Name: Homepage
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package newspotrika
 */


get_header();
?>
<div class="container">
	<?php
	while ( have_posts() ) : the_post();

		the_content();

	endwhile; // End of the loop.
	?>
</div>
<?php
get_footer();