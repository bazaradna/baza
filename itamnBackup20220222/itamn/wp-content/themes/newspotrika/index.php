<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package newspotrika
 */

get_header();
?>

<div class="section-padding">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-<?php echo is_active_sidebar( 'sidebar' ) ? 8 : 12 ; ?>">
				<?php
				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					the_posts_pagination( array(
					    'mid_size'  => 2,
					    'prev_text' => esc_html__( '&#10094; Prev', 'newspotrika' ),
					    'next_text' => esc_html__( 'Next &#10095;', 'newspotrika' ),
					) );

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div>

			
			<?php if (is_active_sidebar( 'sidebar' )): ?>
			<div class="col-sm-4">
				<?php get_sidebar(); ?>
			</div>
			<?php endif ?>
			
		</div>
	</div>
</div>
<?php
get_footer();
