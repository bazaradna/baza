<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package newspotrika
 */

global $newspotrika_opt;
$social_share = !empty( $newspotrika_opt['social_share'] ) ? $newspotrika_opt['social_share'] : '';
$newspotrika_excerpt_length = !empty( $newspotrika_opt['newspotrika_excerpt_length'] ) ? $newspotrika_opt['newspotrika_excerpt_length'] : 20;

?>

<?php if (is_singular()) {?>
	
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
	<?php if (has_post_thumbnail()): ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail('newspotrika-1280x600'); ?>
		</div>		
	<?php endif ?>
	<?php
	if ( 'post' === get_post_type() ) :
		?>
		<div class="entry-meta">
			<ul class="list-inline">
				<li class="list-inline-item">
					<i class="fa fa-user"></i> <?php echo esc_html__( 'Нийтэлсэн:', 'newspotrika' ) ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php the_author(); ?></a>
				</li>
				<li class="list-inline-item">
					<?php the_time(); ?>
				</li>
				
			</ul><!-- .entry-meta -->
		</div>
	<?php endif; ?>


	<div class="entry-content">
		<?php
			the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'newspotrika' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Хуудас:', 'newspotrika' ),
				'after'  => '</div>',
			) );
		
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php newspotrika_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php if ( true == $social_share ) {
	newspotrika_social_sharing();
} ?>

<?php } else {?>
	
<article id="post-<?php the_ID(); ?>" class="excerpt-item">
	<div class="row">
		<?php if (has_post_thumbnail()): ?>
		<div class="col-sm-4">
			<a href="<?php the_permalink() ?>">
				<?php the_post_thumbnail( 'newspotrika-500x360' ); ?>
			</a>
		</div>
		<?php endif ?>
		
		<div class="col-sm-<?php if( has_post_thumbnail() ){ echo'8'; } else { echo'12'; } ?>">
			<header class="entry-header">
			<?php the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<ul class="list-inline">
						<li class="list-inline-item">
							</i> <?php echo esc_html__( 'Нийтэлсэн', 'newspotrika' ) ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php the_author(); ?></a>
						</li>
						<li class="list-inline-item">
							<?php the_time(); ?>
						</li>
					</ul><!-- .entry-meta -->
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->


		<div class="entry-content">
			<p><?php echo esc_html(newspotrika_excerpt($newspotrika_excerpt_length)); ?></p>
		</div><!-- .entry-content -->

		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
<?php } ?>
