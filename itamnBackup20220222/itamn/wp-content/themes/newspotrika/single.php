<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package newspotrika
 */

get_header();
global $newspotrika_opt;
$newspotrika_blog_details_post_navigation = isset( $newspotrika_opt['newspotrika_blog_details_post_navigation'] ) ? $newspotrika_opt['newspotrika_blog_details_post_navigation'] : true;
?>

<div class="section-padding">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-<?php echo is_active_sidebar( 'sidebar' ) ? 8 : 12 ; ?>">

			<?php
			while ( have_posts() ) : the_post();
				
				get_template_part( 'template-parts/content', get_post_type() );
				
		
				
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</div>
            <?php if (is_active_sidebar( 'sidebar' )): ?>
			<div class="col-sm-12">
				<?php get_sidebar(); ?>
			</div>
			<?php endif ?>
			
		</div>
	</div>
</div>
<?php
get_footer();
