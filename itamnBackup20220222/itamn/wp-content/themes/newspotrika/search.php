<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package newspotrika
 */

get_header();
?>


<div class="section-padding">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-<?php echo is_active_sidebar( 'sidebar' ) ? 8 : 12 ; ?>">

			<?php if ( have_posts() ) :
				
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

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